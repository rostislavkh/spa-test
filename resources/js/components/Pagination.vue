<template>
    <div class="wrapper-settings">
        <nav class="pagination" v-if="paginates.is_view_paginate">
            <ul class="pagination-list">
                <li class="pagination-item disable" aria-disabled="true" aria-label="« Previous" v-if="paginates.is_first">
                    <span class="pagination-link" aria-hidden="true">
                        <i class="arrow-p prev">«</i>
                    </span>
                </li>
                <li class="pagination-item" v-else>
                    <button type="button" class="pagination-link"  rel="prev"
                        aria-label="« Previous" @click="selectPage(paginates.curr_page - 1)">
                        <i class="arrow-p prev">«</i>
                    </button>
                </li>
                <li class="pagination-item" v-for="(page, key) in paginates.items" :key="key" :class="Number(key) == paginates.curr_page ? 'active' : ''">
                    <span class="pagination-link" v-if="Number(key) == paginates.curr_page">{{ key }}</span>
                    <button type="button" class="pagination-link" @click="selectPage(Number(key))" v-else>{{ key }}</button>
                </li>
                <li class="pagination-item" v-if="paginates.is_last">
                    <button type="button" class="pagination-link" @click="selectPage(paginates.curr_page + 1)" rel="next" aria-label="Next »">
                        <i class="arrow-p next">»</i>
                    </button>
                </li>
                <li class="pagination-item disable" aria-disabled="true" aria-label="Next »" v-else>
                    <span class="pagination-link" aria-hidden="true">
                        <i class="arrow-p next">»</i>
                    </span>
                </li>
            </ul>
        </nav>
        <slot></slot>
    </div>
</template>

<script>
export default {
    props: {
        paginates: {
            type: Object,
            required: false
        }
    },
    methods: {
        selectPage(page) {
            this.$emit('selectPage', page);
        }
    }
}
</script>

<style scoped>
.pagination {
    margin-top: 10px;
}

.pagination-list {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
}

.pagination-item {
    margin-right: 4px;
}

.pagination-item:last-child {
    margin-right: 0;
}

.pagination-item.disable .arrow-p:before {
    border-color: rgba(19, 21, 17, 0.4);
}

.pagination-item.disable .pagination-link:hover {
    background: #FEFEFE;
    color: #1D350A;
    cursor: auto;
}

.pagination-item.disable .pagination-link:hover .arrow-p:before {
    border-color: rgba(19, 21, 17, 0.4);
}

.pagination-item.active .pagination-link {
    background: #0a58ca;
    color: #FEFEFE;
}

.pagination-item.active .pagination-link .arrow-p:before {
    border-color: rgba(19, 21, 17, 0.4);
}

.pagination-link {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    width: 24px;
    height: 24px;
    background: #f3f5f7;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    font-family: "Inter-Regular", sans-serif;
    font-weight: 400;
    font-size: 14px;
    line-height: 17px;
    color: black;
    cursor: pointer;
}

.pagination-link:hover {
    background: #0a58ca;
    color: #FEFEFE;
}



.pagination-link:hover .arrow-p:before {
    border-color: #FEFEFE;
}

.pagination-link {
    border: none;    
}

.wrapper-settings {
    display: flex;
    width: 100%;
    justify-content: center;
}

.btn.applyBtn,
.btn.green-def {
    max-width: 150px;
}
</style>