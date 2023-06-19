<div>
  @if (!isset($without_edit))
  <x-buttons.edit route='{!!route("$module_name.edit", $data)!!}' title="{{__('Edit')}} {{ ucwords(Str::singular($module_name)) }}" small="true" />
  @endif
  @if (!isset($without_delete))
  <x-buttons.delete index-route='{!!route("$module_name.index", request()->type)!!}' route='{!!route("$module_name.destroy", $data)!!}' title="{{__('Delete')}} {{ ucwords(Str::singular($module_name)) }}" small="true" />
  @endif
</div>
