@props(['title'])

<div class="card-title">
    <i class="ki-duotone ki-badge fs-1 me-2">
        <span class="path1"></span>
        <span class="path2"></span>
        <span class="path3"></span>
        <span class="path4"></span>
        <span class="path5"></span>
    </i>
    <h2>Add {{ $title }}</h2>
</div>
{{ $slot }}
