<template>
    <div class="custom-file">
        <input type="file" class="custom-file-input" accept="image/*" @change="onChange" id="customFile">
        <label class="custom-file-label" for="customFile">انتخاب فایل</label>
    </div>
</template>

<script>
    export default {
        methods: {
            onChange(e) {
                if (! e.target.files.length) return;

                let file = e.target.files[0];

                let reader = new FileReader();

                reader.readAsDataURL(file);

                reader.onload = e => {
                    let src = e.target.result;

                    this.$emit('loaded', { src, file });
                }
            }
        }
    }
</script>