<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="name" value="{!! is_null(old('name')) && isset($service) ?  $service->name : old('name') !!}" autofocus/>
    <label class="mdl-textfield__label">Name</label>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="landing_url" value="{!! is_null(old('landing_url')) && isset($service) ?  $service->landing_url : old('landing_url') !!}"/>
    <label class="mdl-textfield__label">Landing URL</label>
</div>
@if(isset($service))
    <div>
        <img src="{{ $service->logo->url() }}"/>
    </div>
@endif
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="file" name="logo" value=""/>
    <label class="mdl-textfield__label">Logo</label>
</div>