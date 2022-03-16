<div class="position-fixed bottom-3 right-3">
    <form method="POST" action="{{route('impersonate.stop')}}">
        @method('delete')
        @csrf
        <button class="btn btn-danger>
            Stop Impersonating
        </button>
    </form>
</div>
