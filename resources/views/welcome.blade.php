<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="antialiased">
    <div class="container mx-auto py-6">
        {{ Form::open(['url' => '#', 'method' => 'post', 'class' => 'w-full max-w-sm']) }}
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                {!! Form::label('name', 'name', ['class' => 'block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4']) !!}
            </div>
            <div class="md:w-2/3">
                {!! Form::text('name', '', ['class' => 'bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500']) !!}

            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                {!! Form::label('tagnameRaw', 'tag name', ['class' => 'block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4']) !!}
            </div>
            <div class="md:w-2/3">
                {!! Form::text('tagnameRaw', '', ['onkeydown' => 'keyFunc(event)', 'onkeyup' => 'keyFunc2(event)', 'class' => 'bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500']) !!}
            </div>
        </div>
        <ul class="list"></ul>
        <div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                  {!! Form::submit('submit', ["class" => "shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"]) !!}
                </div>
              </div>
        </div>
        {{ Form::close() }}

        <div
            class="not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25"
            >
            <div
                style="background-position: 10px 10px"
                class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] dark:bg-grid-slate-700/25 dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]"
                >
            </div>
            <div class="relative rounded-xl overflow-auto">
                <div class="shadow-sm overflow-hidden my-8">
                <table class="border-collapse table-auto w-full text-sm">
                    <thead>
                    <tr>
                        <th
                            class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left"
                            >
                        Name
                        </th>
                        <th
                            class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left"
                            >
                        Tag
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-slate-800">
                        @forelse ($posts as $post)
                        <tr>
                            <td
                                class="border-b border-slate-200 dark:border-slate-600 p-4 pl-8 text-slate-500 dark:text-slate-400"
                                >
                                {{ $post->name }}
                            </td>
                            <td
                                class="border-b border-slate-200 dark:border-slate-600 p-4 text-slate-500 dark:text-slate-400"
                                >
                                @forelse ($post->tags as $item)
                                {{ $item->name }}
                                @empty
                                
                                @endforelse    
                            </td>
                        </tr>
                        @empty
                        
                        @endforelse
                    </tbody>
                </table>
                </div>
            </div>
            <div
                class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5"
                >
            </div>
        </div>

    </div>
</body>
<script>
    function keyFunc(btn) {
        if (btn.keyCode === 188) {
            const tag = document.createElement("input"),
                li = document.createElement("li")
            tag.setAttribute("type", "hidden")
            tag.setAttribute("name", `data[${btn.target.value}]`)
            tag.setAttribute("value", `${btn.target.value}`)
            li.textContent = `${btn.target.value}`
            btn.target.closest("div").appendChild(tag)
            btn.target.closest("body").querySelector(".list").appendChild(li)
        }
    }

    function keyFunc2(btn) {
        return btn.keyCode === 188 ? btn.target.value = "" : ""
    }
</script>

</html>
