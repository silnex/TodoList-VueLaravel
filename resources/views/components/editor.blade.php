<div class="card-body">
    <h5 class="card-title">
        <div class="form-group">
            <label for="todoTitle">Todo Title</label>
            <input type="text" name="title" class="form-control" id="todoTitle" value="{{ $todo->title ?? '' }}">
        </div>
    </h5>
    <hr>
    <div class="form-group card-text">
        <label for="todoDescription">Description</label>
        <textarea class="form-control" name="description" id="todoDescription"
            rows="3">{{ $todo->description ?? '' }}</textarea>
    </div>
</div>
