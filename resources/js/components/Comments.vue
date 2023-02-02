<template>
    <div class="d-grid gap-2 col-6 mx-auto mb-2 mt-4">
        <button class="btn btn-primary" type="button" data-bs-target="#createModal" data-bs-toggle="modal">Added new comment</button>
    </div>
    <hr />
    <h3 class="text-center d-block mb-3">Sort type</h3>
    <div class="filter-comments">
        <button type="button" class="btn" :class="sort_type.field == 'date' ? 'btn-info' : 'btn-outline-info'" @click="setSort('date')">Date {{ sort_type.field == 'date' ? sort_type.type_emoji : '' }}</button>
        <button type="button" class="btn" :class="sort_type.field == 'name' ? 'btn-info' : 'btn-outline-info'" @click="setSort('name')">User name {{ sort_type.field == 'name' ? sort_type.type_text : '' }}</button>
        <button type="button" class="btn" :class="sort_type.field == 'email' ? 'btn-info' : 'btn-outline-info'" @click="setSort('email')">Email {{ sort_type.field == 'email' ? sort_type.type_text : '' }}</button>
    </div>
    <hr />
    <div class="comments">
        <comment-datails :items="comments" @setReply="setReply"></comment-datails>
    </div>
    <pagination :paginates="paginates" @selectPage="selectPage">
    </pagination>

    <!-- Модалка створення коментаря -->
    <div class="modal fade" id="createModal" aria-hidden="true" aria-labelledby="createModalLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createModalLabel">Create comment</h1>
                    <button type="button" class="btn-close close-modal-create-comment" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- is-invalid - якщо не пройдена валідація. is-valid - якщо пройдена -->
                    <form class="form-create-comment">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" placeholder="Your name..." v-model="create_comment_form.name.content" required>
                            <div class="text-danger" v-if="create_comment_form.name.is_invalid">
                                {{ create_comment_form.name.invalid_text }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email: <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" placeholder="example@gmail.com" v-model="create_comment_form.email.content" required>
                            <div class="text-danger" v-if="create_comment_form.email.is_invalid">
                                {{ create_comment_form.email.invalid_text }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">Home page:</label>
                            <input type="url" class="form-control" id="url" placeholder="https://example.com" v-model="create_comment_form.url.content">
                            <div class="text-danger" v-if="create_comment_form.url.is_invalid">
                                {{ create_comment_form.url.invalid_text }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">File (img or txt):</label>
                            <input type="file" class="form-control input-file-comment" id="file" accept=".png, .jpg, .gif, .txt" aria-label="file example">
                            <div class="text-danger" v-if="create_comment_form.file.is_invalid">
                                {{ create_comment_form.file.invalid_text }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Comment: <span class="text-danger">*</span></label>
                            <QuillEditor ref="createCommentText" :options="options" />
                            <div class="text-danger" v-if="create_comment_form.comment.is_invalid">
                                {{ create_comment_form.comment.invalid_text }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <vue-recaptcha ref="recaptcha1" sitekey="6LdOizkkAAAAAA7aE8M7whpI3eQbTXXCKxSxPG6v" />
                            <div class="text-danger" v-if="!is_valid_captha">
                                No valid captha
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" @click="create">Create</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Модалка створення відповіді на коментар -->
    <div class="modal fade" id="replyModal" aria-hidden="true" aria-labelledby="replyModalLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="replyModalLabel">Reply</h1>
                    <button type="button" class="btn-close close-modal-reply-comment" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- is-invalid - якщо не пройдена валідація. is-valid - якщо пройдена -->
                    <form class="form-reply-comment">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" placeholder="Your name..."
                                v-model="reply_comment_form.name.content" required>
                            <div class="text-danger" v-if="reply_comment_form.name.is_invalid">
                                {{ reply_comment_form.name.invalid_text }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email: <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" placeholder="example@gmail.com"
                                v-model="reply_comment_form.email.content" required>
                            <div class="text-danger" v-if="reply_comment_form.email.is_invalid">
                                {{ reply_comment_form.email.invalid_text }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">Home page:</label>
                            <input type="url" class="form-control" id="url" placeholder="https://example.com"
                                v-model="reply_comment_form.url.content">
                            <div class="text-danger" v-if="reply_comment_form.url.is_invalid">
                                {{ reply_comment_form.url.invalid_text }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">File (img or txt):</label>
                            <input type="file" class="form-control input-file-comment-reply" id="file" accept=".png, .jpg, .gif, .txt"
                                aria-label="file example">
                            <div class="text-danger" v-if="reply_comment_form.file.is_invalid">
                                {{ reply_comment_form.file.invalid_text }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Comment: <span class="text-danger">*</span></label>
                            <QuillEditor ref="replyCommentText" :options="options" />
                            <div class="text-danger" v-if="reply_comment_form.comment.is_invalid">
                                {{ reply_comment_form.comment.invalid_text }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <vue-recaptcha ref="recaptcha2" sitekey="6LdOizkkAAAAAA7aE8M7whpI3eQbTXXCKxSxPG6v" />
                            <div class="text-danger" v-if="!is_valid_captha_2">
                                No valid captha
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" @click="createReply">Reply</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { VueRecaptcha } from 'vue-recaptcha';
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';

export default {
    components: { VueRecaptcha, QuillEditor },
    data() {
        return {
            sort_type: {
                field: 'date',
                code: 'date_desc',
                type_emoji: '👇',
                type_text: '(Z-A)'
            },

            reply_id: 0,

            comments: {},

            options: {
                debug: 'info',
                modules: {
                    syntax: true,
                    toolbar: [
                        ['bold', 'italic'],
                        ['code-block'],
                        ['link'],
                        ['clean']
                    ]
                },
                theme: 'snow'
            },


            create_comment_form: {
                name: {
                    content: '',
                    is_invalid: false,
                    invalid_text: null
                },
                email: {
                    content: '',
                    is_invalid: false,
                    invalid_text: null
                },
                url: {
                    content: '',
                    is_invalid: false,
                    invalid_text: null
                },
                file: {
                    content: '',
                    is_invalid: false,
                    invalid_text: null
                },
                comment: {
                    content: '',
                    is_invalid: false,
                    invalid_text: null
                },
            },

            reply_comment_form: {
                name: {
                    content: '',
                    is_invalid: false,
                    invalid_text: null
                },
                email: {
                    content: '',
                    is_invalid: false,
                    invalid_text: null
                },
                url: {
                    content: '',
                    is_invalid: false,
                    invalid_text: null
                },
                file: {
                    content: '',
                    is_invalid: false,
                    invalid_text: null
                },
                comment: {
                    content: '',
                    is_invalid: false,
                    invalid_text: null
                },
            },

            paginates: {
                is_view_paginate: false,
                curr_page: 0,
                items: [],
                total: 0,
                is_first: false,
                is_last: false,
            },

            is_valid_captha: true,
            is_valid_captha_2: true
        }
    },
    methods: {
        setReply(e) {
            this.reply_id = e;
            console.log(e);
        },
        selectPage(e) {
            this.paginates.curr_page = e;
            this.getComments();
        },
        setSort(field) {
            if (field + '_asc' == this.sort_type.code) {
                this.sort_type.code = field + '_desc';
                this.sort_type.type_emoji = '👇';
                this.sort_type.type_text = '(Z-A)';
            } else {
                this.sort_type.code = field + '_asc';
                this.sort_type.field = field;
                this.sort_type.type_emoji = '☝️';
                this.sort_type.type_text = '(A-Z)';
            }

            this.getComments();
        },
        async getComments() {
            let data = [];
            await axios.get('api/get-comments/' + this.sort_type.code + '?page=' + this.paginates.curr_page).then(response => (data = response.data));

            this.comments = data.comments ? data.comments : {};

            if (data.paginates) {
                this.paginates = data.paginates;
            }
        },
        cleanErrors() {
            this.is_valid_captha = true;
            
            for (let key in this.create_comment_form) {
                this.create_comment_form[key].is_invalid = false;
                this.create_comment_form[key].invalid_text = null;
            }

            this.is_valid_captha_2 = true;
            
            for (let key in this.reply_comment_form) {
                this.reply_comment_form[key].is_invalid = false;
                this.reply_comment_form[key].invalid_text = null;
            }
        },
        cleanCreateForm() {
            for (let key in this.create_comment_form) {
                this.create_comment_form[key].content = '';
            }
        },
        cleanReplyForm() {
            for (let key in this.reply_comment_form) {
                this.reply_comment_form[key].content = '';
            }
        },
        async create() {
            this.cleanErrors();

            let errors = null;

            const data = new FormData(document.querySelector('.form-create-comment'));
            let file = document.querySelector('.input-file-comment');

            if (file.files[0]) {
                data.append('file', file.files[0]);
            }
            data.append('parrent_id', null);
            data.append('name', this.create_comment_form.name.content);
            data.append('email', this.create_comment_form.email.content);
            data.append('url', this.create_comment_form.url.content);
            if (this.$refs.createCommentText.getText() != '\n') {
                data.append('comment', this.$refs.createCommentText.getHTML());
            }

            await axios.post('api/make-comment', data).catch(error => (errors = error.response.data.errors));

            if (errors) {
                for (let key in errors) {
                    if (key == 'g-recaptcha-response') {
                        this.is_valid_captha = false;
                    } else {
                        this.create_comment_form[key].is_invalid = true;
                        this.create_comment_form[key].invalid_text = errors[key][0];
                    }
                }
            } else {
                this.cleanErrors();
                this.cleanCreateForm();
                this.$refs.createCommentText.setText('');
            }

            this.$refs.recaptcha1.reset();

            document.querySelector('.close-modal-create-comment').click();

            this.getComments();
        },
        async createReply() {
            this.cleanErrors();

            let errors = null;

            const data = new FormData(document.querySelector('.form-reply-comment'));
            let file = document.querySelector('.input-file-comment-reply');

            if (file.files[0]) {
                data.append('file', file.files[0]);
            }
            data.append('parrent_id', this.reply_id);
            data.append('name', this.reply_comment_form.name.content);
            data.append('email', this.reply_comment_form.email.content);
            data.append('url', this.reply_comment_form.url.content);
            if (this.$refs.replyCommentText.getText() != '\n') {
                data.append('comment', this.$refs.replyCommentText.getHTML());
            }

            await axios.post('api/make-comment', data).catch(error => (errors = error.response.data.errors));

            if (errors) {
                for (let key in errors) {
                    if (key == 'g-recaptcha-response') {
                        this.is_valid_captha = false;
                    } else {
                        if (this.reply_comment_form[key]) {
                            this.reply_comment_form[key].is_invalid = true;
                            this.reply_comment_form[key].invalid_text = errors[key][0];
                        }
                    }
                }
            } else {
                this.cleanErrors();
                this.cleanReplyForm();
                this.$refs.replyCommentText.setText('');
            }

            this.$refs.recaptcha2.reset();

            document.querySelector('.close-modal-reply-comment').click();

            this.getComments();
        }
    },
    mounted() {
        this.getComments();
        hljs.configure({   // optionally configure hljs
            languages: ['javascript', 'ruby', 'python']
        });
    }
}
</script>

<style lang="scss">
.filter-comments {
    display: flex;
    justify-content: center;
    gap: 5px;
}

.comments {
    display: flex;
    flex-direction: column;
    max-width: 600px;
    gap: 40px;
    margin: 20px auto;

    &__img {
        display: block;
        margin: auto auto 20px auto;
        width: 320px;
        height: 240px;
        border-radius: 5px;
        box-shadow: 5px 5px 10px -3px rgba(0, 0, 0, 0.75);
        overflow: hidden;
        transition: .3s;

        &:hover {
            transform: scale(1.05);
            transition: .3s;
        }

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    }

    .sub-comment {
        margin-left: 30px;
    }

    &__header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        background-color: #f3f5f7;
        padding: 5px 10px;
        margin-bottom: 10px;

        .header-left {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: 10px;
        }

        .header-right {
            margin-right: 10px;

            path {
                transition: .3s;
                fill: rgb(101, 180, 255);
            }
        }
    }

    &__avatar {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
    }

    .background-img {
        width: 50px;
        height: 50px;
        padding: 5px;
        border-radius: 50%;
        background-color: white;
        box-sizing: border-box;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    &__text {
        i {
            display: block;
            padding-left: 5px;
            margin: 20px 0;
            border-left: 2px solid rgb(101, 180, 255);
        }
    }
}
</style>