<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="name" value="{!! is_null(old('name')) && isset($category) ?  $category->name : old('name') !!}" autofocus/>
    <label class="mdl-textfield__label">Name</label>
</div>