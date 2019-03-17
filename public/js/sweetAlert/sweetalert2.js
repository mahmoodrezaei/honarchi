var SweetAlert2Demo = {
    init: function() {
        $("#m_sweetalert_remove").click(function(e) {
            swal({
                text: "آیا اطمینان دارید که میخواهید این مورد را حذف کنید؟",
                type: "warning",
                confirmButtonText:
                    "<span><i class='la'></i><span>بله</span></span>",
                confirmButtonClass:
                    "btn btn-danger m-btn m-btn--pill m-btn--air m-btn--icon",
                showCancelButton: !0,
                cancelButtonText:
                    "<span><i class='la'></i><span>خیر</span></span>",
                cancelButtonClass:
                    "btn btn-secondary m-btn m-btn--pill m-btn--icon"
            }).then(answer => {
                console.log(answer);
            });
        });
    }
};
jQuery(document).ready(function() {
    SweetAlert2Demo.init();
});
