<template>
  <span class="m-form__help text-danger">
    <slot></slot>
  </span>
</template>

<script>
export default {
  props: ["errors"]
};
</script>