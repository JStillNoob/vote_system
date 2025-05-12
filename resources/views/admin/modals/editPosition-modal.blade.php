<div class="modal fade" id="editPositionModal-{{ $position->position_id }}" tabindex="-1" aria-labelledby="editPositionModalLabel{{ $position->position_id }}" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('positions.update', $position->position_id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editPositionModalLabel{{ $position->position_id }}">Edit Position</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="position-title-{{ $position->position_id }}" class="form-label">Title</label>
            <input type="text" class="form-control" id="position-title-{{ $position->position_id }}" name="title" value="{{ $position->title }}" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-warning">Update Position</button>
        </div>
      </div>
    </form>
  </div>
</div>