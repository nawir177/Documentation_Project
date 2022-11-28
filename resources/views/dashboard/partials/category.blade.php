
<h1 class="font-Secular font-bold category text-2xl mb-7 font-weight-bold text-cyan-500">Categories</h1>
<div class="grid md:grid-cols-4 grid-cols-2 gap-1">
    @foreach ($category as $item)
        <a href="category/{{ $item->id }}"
            class="flex py-3 px-6 mr-5 mb-2 bg-white rounded-xl hover:shadow-cyan-200  hover:bg-cyan-500 hover:shadow-xl group justify-center">
            <div class="group-hover:text-white m-auto"
                style="color:{{ $item->color }}">
                <div class="group-hover:text-white w-10 h-10 m-auto">
                    {!! $item->icon->value !!}
                </div>
                <p class="mt-4 text-center font-inter text-sm text-cyan-500 group-hover:text-white">
                    {{ $item->name }}
                    <div class="text-xs text-center opacity-60 group-hover:text-white text-slate-600">
                        {{ $item->folder->count() }} Folder
                    </div>
                </p>
            </div>
        </a>
    @endforeach
</div>

@push('after-scripts')
    <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();
            if ($value) {
                $('.allData').hide();
                $('.searchData').show();
            } else {
                $('.allData').show();
                $('.searchData').hide();
            }
            $.ajax({
                type: 'get',
                url: '{{ URL::to('search') }}',
                data: {
                    'search': $value
                },

                success: function(data) {
                    console.log(data);
                    $('#Content').html(data);
                }
            });
        })
    </script>
@endpush
