var FormControls = {
    init: function () {
        $("#new_permission_form").validate({
            rules: {
                name: {required: !0, minlength: 5},
            }, invalidHandler: function (e, r) {
                $("#m_form_1_msg").removeClass("m--hide").show(), mUtil.scrollTop()
            }, submitHandler: function (e) {
            }
        })
    }
};
jQuery(document).ready(function () {
    FormControls.init()
});