<div class="fixed bottom-5 right-5">
    <form method="POST" action="{{route('impersonate.stop')}}">
        @method('delete')
        @csrf
        <button class=" px-4 py-2
                    items-center
                    text-white font-semibold text-xs uppercase
                    bg-red-600  hover:bg-red-500 active:bg-red-600
                    rounded-md
                    border border-transparent focus:border-red-700
                    focus:outline-none focus:ring focus:ring-red-200
                    disabled:opacity-25
                    tracking-widest
                    transition
                  "
        >
            Stop Impersonating
        </button>
    </form>
</div>
