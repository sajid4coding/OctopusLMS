@extends('layouts.admin_master')
@section('style_body')
<style>

.tags-input-wrapper{
    background: transparent;
    padding: 10px;
    border-radius: 4px;
    max-width: 400px;
    border: 1px solid #ccc
}
.tags-input-wrapper input{
    border: none;
    background: transparent;
    outline: none;
    width: 140px;
    margin-left: 8px;
}
.tags-input-wrapper .tag{
    display: inline-block;
    background-color: #fa0e7e;
    color: white;
    border-radius: 40px;
    padding: 0px 3px 0px 7px;
    margin-right: 5px;
    margin-bottom:5px;
    box-shadow: 0 5px 15px -2px rgba(250 , 14 , 126 , .7)
}
.tags-input-wrapper .tag a {
    margin: 0 7px 3px;
    display: inline-block;
    cursor: pointer;
}
</style>
@endsection
@section('dashboard_content')
{{--
    ||===========================================
    ||          Form Design Start
    ||===========================================
--}}

<div class="container">
    <div class="row">
        <div class="col-8">
            <form class="border p-5" action="{{ route('store.permission') }}" method="POST">
                @if (session('success'))
                <div class="alert alert-primary" role="alert">
                    <p class="mb-0">{{ session('success') }}</p>
                  </div>
                @endif
                @csrf
                <h1 class="text-center font-mono text-primary"> --- Add Permission ---</h1>
                <div class="mb-3">

                    <div class="examples">
                        <div class="container">

                            <div class="form-group">
                                <label for="">Give Permissions {{ $id }}</label>
                                <input name="name" type="text" id="tag-input1">

                                <input type="hidden" name="role_id" value="{{ $id }}">
                            </div>

                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        {{-- <div class="col-6">
            <table class="table border">
                <thead>
                  <tr>
                    <th scope="col">SL. No.</th>
                    <th scope="col">Name of Permission</th>
                    <th scope="col">Guard Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($permissions as $permission)
                        <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td>
                            <a href="{{ route('delete.permission',$permission->id) }}" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4">
                            <p class="bg-danger text-white p-2 text-center">No permission yet!!</p>
                        </td>
                    </tr>
                    @endforelse

                </tbody>
              </table>
        </div> --}}
    </div>

</div>

{{--
    ||===========================================
    ||          Form Design Start
    ||===========================================
--}}
@endsection
@section('script_body')
<script>
(function () {
  "use strict";

  // Plugin Constructor
  var TagsInput = function (opts) {
    this.options = Object.assign(TagsInput.defaults, opts);
    this.init();
  };

  // Initialize the plugin
  TagsInput.prototype.init = function (opts) {
    this.options = opts ? Object.assign(this.options, opts) : this.options;

    // if (this.initialized) this.destroy();

    if (
      !(this.orignal_input = document.getElementById(this.options.selector))
    ) {
      console.error(
        "tags-input couldn't find an element with the specified ID"
      );
      return this;
    }

    this.arr = [];
    this.wrapper = document.createElement("div");
    this.input = document.createElement("input");
    init(this);
    initEvents(this);

    this.initialized = true;
    return this;
  };

  // Add Tags
  TagsInput.prototype.addTag = function (string) {
    if (this.anyErrors(string)) return;

    this.arr.push(string);
    var tagInput = this;

    var tag = document.createElement("span");
    tag.className = this.options.tagClass;
    tag.innerText = string;

    var closeIcon = document.createElement("a");
    closeIcon.innerHTML = "&times;";

    // delete the tag when icon is clicked
    closeIcon.addEventListener("click", function (e) {
      e.preventDefault();
      var tag = this.parentNode;

      for (var i = 0; i < tagInput.wrapper.childNodes.length; i++) {
        if (tagInput.wrapper.childNodes[i] == tag) tagInput.deleteTag(tag, i);
      }
    });

    tag.appendChild(closeIcon);
    this.wrapper.insertBefore(tag, this.input);
    this.orignal_input.value = this.arr.join(",");

    return this;
  };

  // Delete Tags
  TagsInput.prototype.deleteTag = function (tag, i) {
    tag.remove();
    this.arr.splice(i, 1);
    this.orignal_input.value = this.arr.join(",");
    return this;
  };

  // Make sure input string have no error with the plugin
  TagsInput.prototype.anyErrors = function (string) {
    if (this.options.max != null && this.arr.length >= this.options.max) {
      console.log("max tags limit reached");
      return true;
    }

    if (!this.options.duplicate && this.arr.indexOf(string) != -1) {
      console.log('duplicate found " ' + string + ' " ');
      return true;
    }

    return false;
  };

  // Add tags programmatically
  TagsInput.prototype.addData = function (array) {
    var plugin = this;

    array.forEach(function (string) {
      plugin.addTag(string);
    });
    return this;
  };

  // Get the Input String
  TagsInput.prototype.getInputString = function () {
    return this.arr.join(",");
  };

  // destroy the plugin
  TagsInput.prototype.destroy = function () {
    this.orignal_input.removeAttribute("hidden");

    delete this.orignal_input;
    var self = this;

    Object.keys(this).forEach(function (key) {
      if (self[key] instanceof HTMLElement) self[key].remove();

      if (key != "options") delete self[key];
    });

    this.initialized = false;
  };

  // Private function to initialize the tag input plugin
  function init(tags) {
    tags.wrapper.append(tags.input);
    tags.wrapper.classList.add(tags.options.wrapperClass);
    tags.orignal_input.setAttribute("hidden", "true");
    tags.orignal_input.parentNode.insertBefore(
      tags.wrapper,
      tags.orignal_input
    );
  }

  // initialize the Events
  function initEvents(tags) {
    tags.wrapper.addEventListener("click", function () {
      tags.input.focus();
    });

    tags.input.addEventListener("keydown", function (e) {
      var str = tags.input.value.trim();

      if (!!~[9, 13, 188].indexOf(e.keyCode)) {
        e.preventDefault();
        tags.input.value = "";
        if (str != "") tags.addTag(str);
      }
    });
  }

  // Set All the Default Values
  TagsInput.defaults = {
    selector: "",
    wrapperClass: "tags-input-wrapper",
    tagClass: "tag",
    max: null,
    duplicate: false
  };

  window.TagsInput = TagsInput;
})();

var tagInput1 = new TagsInput({
  selector: "tag-input1",
  duplicate: false,
  max: 10
});
tagInput1.addData(["PHP", "JavaScript", "CSS"]);


</script>
@endsection
