@component('mail::message')

# 昨日は{{ $count }}件のイラストが追加されました！

{{ $toUser->name }}さんこんにちは！

昨日は{{ $count }}件のイラストが追加されました！最新のイラストを見に行きましょう。

@component('mail::button', ['url' => route('illust.index')])
    イラストを見に行く
@endcomponent

@endcomponent