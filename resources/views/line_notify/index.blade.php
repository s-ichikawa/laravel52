<a href="/notify/auth">Line Notify Auth</a>

@if(Session::has('access_token'))
    <form action="/notify/send" method="post">
        <input type="hidden" value="{{ session('access_token') }}">
        <label>
            メッセージ
            <input type="text" name="message" value="">
        </label>
        <input type="submit" value="送信">
    </form>
@endif