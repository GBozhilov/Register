<div>
    @if(session()->has('message'))
        <div class="py-4 bg-green-300 text-center border rounded-lg">{{session()->get('message')}}</div>
    @elseif(session()->has('error'))
        <div class="py-4 bg-red-300 text-center border rounded-lg">{{session()->get('error')}}</div>
    @endif

    @if ($errors->any())
        <div class="py-4 bg-red-300 text-center border rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>