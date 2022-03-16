<div class="position-fixed" style="bottom: 10px; right: 10px">
    <form method="POST" action="{{route('impersonate.stop')}}">
        @method('delete')
        @csrf
        <button class="btn btn-danger">
            Stop Impersonating
        </button>
    </form>
</div>
