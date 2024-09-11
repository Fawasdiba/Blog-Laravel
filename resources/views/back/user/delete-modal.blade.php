@foreach ($users as $item)
    <!-- Check if current user can delete this user -->
    @if (auth()->user()->role == 1 && auth()->user()->id != $item->id)
        <div class="modal fade" id="modalDelete{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="modalDeleteLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title fs-5" id="modalDeleteLabel{{ $item->id }}">Delete User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ url('users/'.$item->id) }}" method="post">
                            @method('DELETE')
                            @csrf

                            <div class="mb-3">
                                <p>Are you sure you want to delete user {{ $item->name }}?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endif
@endforeach
