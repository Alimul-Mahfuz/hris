<div class="modal-header">
    <h1 class="modal-title fs-5" id="staticBackdropLabel">New Role</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-12">
            <label for="role-status" id="lb">Permission</label><span class="text-danger">*</span>
            <div class="row">
                @foreach( $modules as $module )
                    @foreach( $module->permission as $module_permission )
                        @if($module->key == $module_permission->key )
                            <div class="col-12 col-md-4">
                                <div
                                    class="permission_block m-2 p-3"
                                    style="border-radius: 10px">
                                    <p>
                                        <label class="mb-0">
                                            <input type="checkbox" class="module_check"
                                                   name="permission[]"
                                                   value="{{ $module_permission->id }}"/>
                                            <span>{{ $module->name }}</span>
                                        </label>
                                    </p>
                                    <div class="sub_module_block">
                                        <ul style="padding-left: 15px">
                                            @foreach( $module->permission as $sub_module_permission )
                                                @if( $sub_module_permission->key != $module->key )
                                                    <p>
                                                        <label class="mb-0">
                                                            <input type="checkbox"
                                                                   class="sub_module_check"
                                                                   name="permission[]"
                                                                   disabled
                                                                   value="{{ $sub_module_permission->id }}"/>
                                                            <span>{{ $sub_module_permission->display_name }}</span>
                                                        </label>
                                                    </p>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    console.log("HI")
    // $(".module_check").click(function (e) {
    //     let $this = $(this);
    //     if (e.target.checked == true) {
    //         $this.closest(".permission_block").find(".sub_module_block").find(".sub_module_check").removeAttr(
    //             "disabled")
    //     } else {
    //         $this.closest(".permission_block").find(".sub_module_block").find(".sub_module_check").attr(
    //             "disabled", "disabled")
    //     }
    // })
</script>




