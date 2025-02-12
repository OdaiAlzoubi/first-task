@props(['class'=>''])
<div class="dt-container dt-bootstrap5 dt-empty-footer">
    <div class="table-responsive">
        <table class="table align-middle table-row-dashed fs-6 gy-5 table-hover {{ $class }}">
            {{ $slot }}
        </table>
    </div>
</div>
