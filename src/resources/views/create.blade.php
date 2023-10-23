<x-app-layout>
   {{-- タグ一覧（スロット$tag） --}}
   <x-slot name="tag">
      <section class="text-gray-600 body-font overflow-hidden rounded-lg border border-gray-300">
         <h1 class="text-lg border-b bg-gray-200 px-3 py-2">
            タグ一覧
         </h1>
         <div class="p-3">
            <div class="mb-2 hover:font-semibold">
               <a href="/">全て表示</a>
            </div>
            @foreach ($tags as $tag)
               <a href="/?tag={{$tag->id}}" class="block mb-1 hover:font-semibold">{{ $tag->name }}</a>
            @endforeach
         </div>
      </section>
   </x-slot>

   {{-- メモ一覧（スロット$memo） --}}
   <x-slot name="memo">
      <section class="text-gray-600 body-font overflow-hidden rounded-lg border border-gray-300">
         <h1 class="text-lg border-b bg-gray-200 px-3 py-2">
            メモ一覧
         </h1>
         <div class="p-3">
            @foreach ($memos as $memo)
               <a href="{{ route('edit', ['id' => $memo->id]) }}" class="block mb-2 hover:font-semibold truncate">{{ $memo->content }}</a>
            @endforeach
         </div>
      </section>
   </x-slot>

   {{-- メモの新規作成（スロット$slot ） --}}
   <section class="text-gray-600 body-font overflow-hidden rounded-lg border border-gray-300">
      <h1 class="text-lg border-b bg-gray-200 px-3 py-2">
         新規メモ作成
      </h1>
      <div class="p-3">
         <form action="{{ route('store') }}" method="POST">
            @csrf
            <div class="mb-3">
               <textarea class="w-full rounded" name="content" rows="5" placeholder="ここにメモを入力"></textarea>
            </div>

            {{-- タグ一覧 --}}
            <div class="mb-5">
               <h1>タグ一覧</h1>
               @foreach ($tags as $t)
                  <div class="inline mr-3 hover:font-semibold">
                     <input type="checkbox" class="rounded mb-1" name="tags[]" id="{{ $t->id }}"
                        value="{{ $t->id }}" />
                     <label class="" for="{{ $t->id }}">{{ $t->name }}</label>
                  </div>
               @endforeach
            </div>

            {{-- 新規タグ作成エリア --}}
            <div class="mb-3">
               <h1>新規タグ作成</h1>
               <input type="text" class="form-control rounded w-50 mb-3" name="new_tag" placeholder = "ここに新規タグを入力" />
            </div>

            <button type="submit"
               class="text-white bg-indigo-500 border-0 py-1 px-4 focus:outline-none hover:bg-indigo-600 rounded text-base">保存</button>
         </form>
      </div>
   </section>
</x-app-layout>
