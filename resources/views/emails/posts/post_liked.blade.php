@component('mail::message')
# Your post was liked

{{ $liker->name }} liked one of your post

@component('mail::button', ['url' => route('posts.show', $post)])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
