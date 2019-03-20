<template>
  <div
    class="modal fade"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    style="display: none;"
    aria-hidden="true"
  >
    <div :class="'modal-dialog modal-'+size" role="document">
      <div class="modal-content">
        <header class="modal-header">
          <slot name="header" class="modal-title" id="exampleModalLabel">
            <h5 class="modal-title" id="exampleModalLabel">Title</h5>
          </slot>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </header>

        <main class="modal-body">
          <div class="form-group">
            <slot name="body">
              <input type="text" placeholder="Body" class="form-control m-input">
            </slot>
          </div>
        </main>
        <div class="modal-footer">
          <slot name="footer">
            <button data-dismiss="modal" type="submit" class="btn btn-primary">ثبت</button>
          </slot>
        </div>
        <!--</form>-->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "modal",
  props: {
    size: {
      type: String,
      default: "sm"
    }
  }
};
</script>