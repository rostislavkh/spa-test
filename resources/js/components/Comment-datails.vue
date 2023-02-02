<template>
    <div class="comments__item ql-snow" v-for="(item, key) in items" :key="key">
        <div class="comments__header">
            <div class="header-left">
                <div class="background-img">
                    <img src="/img/test.png" alt="avatar" class="comments__avatar">
                </div>
                <b class="comments__name">{{ item.name }}</b>
                <span class="comments__date">{{ item.date }} в {{ item.time }}</span>
            </div>
            <a :href="'reply/' + item.id" class="header-right">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25px"
                    height="25px" viewBox="0 0 25 25" version="1.1">
                    <g id="surface1">
                        <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;"
                            d="M 9.632812 5.9375 L 9.632812 1.410156 L 0 10.265625 L 9.632812 19.125 L 9.632812 15.054688 C 18.984375 15.296875 23.738281 22.488281 23.785156 22.5625 L 24.449219 23.589844 L 24.6875 22.390625 C 24.894531 21.34375 25 20.265625 25 19.1875 C 25 11.027344 19.265625 6.101562 9.632812 5.9375 Z M 23.894531 21.074219 C 22.140625 18.960938 17.203125 14.054688 9.140625 14.054688 L 8.644531 14.054688 L 8.644531 16.871094 L 1.460938 10.265625 L 8.644531 3.664062 L 8.644531 6.925781 L 9.140625 6.925781 C 18.589844 6.925781 24.007812 11.394531 24.007812 19.1875 C 24.007812 19.820312 23.96875 20.449219 23.894531 21.074219 Z M 23.894531 21.074219 " />
                    </g>
                </svg>
            </a>
        </div>
        <a v-if="item.file && item.file_format != 'txt'" :href="item.file" :data-lightbox="item.file" target="_blank" :data-title="item.file_name" class="comments__img">
            <img :src="item.file" alt="img">
        </a>
        <a v-if="item.file && item.file_format == 'txt'" :href="item.file" target="_blank" class="comments__img comments__txt">
            <img src="/img/text-file.png" alt="img">
        </a>
        <div class="comments__text ql-editor" v-html="item.comment"></div>
        <div class="sub-comment" v-if="item.childs">
            <comment-datails :items="item.childs"></comment-datails>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        items: {
            type: Object,
            required: true
        }
    }
}
</script>

<style>
.comments__txt {
    width: 250px;
    padding: 15px;
}

.comments__txt img {
    object-fit: contain;
}
</style>