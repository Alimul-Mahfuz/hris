<div class="modal-header">
    <h1 class="modal-title fs-5" id="staticBackdropLabel">New Role</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form>
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <label for="role_name" class="form-label">Role name</label><span class="text-danger">*</span>
                            <input type="text" id="role_name" name="role_name" class="form-control">
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="is_active" class="form-label">Active Status</label><span class="text-danger">*</span>
                            <select class="form-select" id="is_active" name="is_active">
                                <option value="" selected disabled>Choose</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="role-status" id="lb" class="form-label">Permissions</label><span class="text-danger">*</span>
                    <div class="row">
                        @foreach( $modules as $module )
                            @foreach( $module->permission as $module_permission )
                                @if($module->key == $module_permission->key)
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="permission_block border rounded p-3 mb-3 shadow-sm" style="border-radius: 10px; background-color: #f9f9f9;">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input module_check" name="permission[]" value="{{ $module_permission->id }}"/>
                                                    <strong>{{ $module->name }}</strong>
                                                </label>
                                            </div>

                                            <!-- Submodule permissions -->
                                            <div class="sub_module_block mt-2">
                                                <ul class="list-unstyled ms-3">
                                                    @foreach( $module->permission as $sub_module_permission )
                                                        @if($sub_module_permission->key != $module->key)
                                                            <li class="mb-1">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input sub_module_check" name="permission[]" disabled value="{{ $sub_module_permission->id }}"/>
                                                                    <span class="text-muted">{{ $sub_module_permission->display_name }}</span>
                                                                </label>
                                                            </li>
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
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(".module_check").click(function (e) {
        let $this = $(this);
        if (e.target.checked == true) {
            $this.closest(".permission_block").find(".sub_module_block").find(".sub_module_check").removeAttr(
                "disabled")
        } else {
            $this.closest(".permission_block").find(".sub_module_block").find(".sub_module_check").attr(
                "disabled", "disabled")
        }
    })
</script>




