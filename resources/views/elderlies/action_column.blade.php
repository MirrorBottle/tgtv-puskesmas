<div>
    @if (!isset($without_edit))
        <x-buttons.edit route='{!! route("$module_name.edit", $data) !!}'
            title="{{ __('Edit') }} {{ ucwords(Str::singular($module_name)) }}" small="true" />
    @endif
    @if (!isset($without_show))
        <x-buttons.show route='{!! route("$module_name.show", $data) !!}'
            title="{{ __('Show') }} {{ ucwords(Str::singular($module_name)) }}" small="true" />
    @endif
    <a href=''
        class='btn btn-success text-white btn-sm'
        data-toggle="tooltip" title="">
        <i class="flaticon-381-add"></i>
    </a>
</div>
