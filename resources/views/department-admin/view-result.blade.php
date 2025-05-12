@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $election->title }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
            margin-left: 250px; /* Account for sidebar */
        }
        
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .header {
            background-color: #1a3e8c;
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }
        
        .header h2 {
            margin: 5px 0 0;
            font-size: 20px;
            font-weight: 600;
        }
        
        .subheader {
            background-color: #f0f0f0;
            padding: 12px 20px;
            font-size: 14px;
            color: #555;
            border-bottom: 1px solid #ddd;
        }
        
        .candidate {
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .candidate:last-child {
            border-bottom: none;
        }
        
        .candidate-info {
            display: flex;
            align-items: center;
        }
        
        .position {
            font-weight: bold;
            margin-right: 10px;
            color: #666;
            min-width: 40px;
        }
        
        .name {
            font-weight: 600;
            margin-bottom: 3px;
        }
        
        .party {
            font-size: 13px;
            color: #777;
        }
        
        .votes {
            font-weight: 700;
            color: #1a3e8c;
            text-align: right;
        }
        
        .votes span {
            display: block;
            font-size: 13px;
            color: #777;
            font-weight: normal;
        }
        
        .leading {
            background-color: #f0f8ff;
            border-left: 4px solid #1a3e8c;
        }
        
        /* Navbar styles */
        .navbar {
            background-color: white;
            padding: 15px;
            border-bottom: 1px solid #eee;
            position: fixed;
            top: 0;
            right: 0;
            left: 250px; /* Account for sidebar */
            z-index: 1000;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            body {
                margin-left: 0;
            }
            .navbar {
                left: 0;
            }
        }
    </style>
</head>
<body>
    @include('department-admin.sidebar')
    
    <nav class="navbar">
        <div class="container-fluid">
            <p class="navbar-brand">Results - {{ $election->title }}</p>
        </div>
    </nav>
    
    @foreach ($positions as $position)
    <div class="container" style="margin-top: 20px; margin-left: 250px;">
        <div class="header">
            <h1>{{ strtoupper($position->position->title) }}</h1>
         
        </div>

      

        @foreach ($position->candidates as $index => $candidate)
            <div class="candidate {{ $index === 0 ? 'leading' : '' }}">
                <div class="candidate-info">
                    <div class="position">
                        {{ $index + 1 }}
                        {{ $index === 0 ? 'st' : ($index === 1 ? 'nd' : ($index === 2 ? 'rd' : 'th') ) }}
                    </div>
                    <div>
                        <div class="name">{{ strtoupper($candidate->user->FirstName) }} {{ strtoupper($candidate->user->MiddleName) }} {{ strtoupper($candidate->user->LastName) }}</div>
                       
                    </div>
                </div>
                <div class="votes">
                    {{ number_format($candidate->votes_count) }}<span>Votes</span>
                </div>
            </div>
        @endforeach
    </div>
@endforeach
</body>
</html>