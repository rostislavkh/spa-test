<template>
    <div class="d-grid gap-2 col-6 mx-auto mb-2 mt-4">
        <button class="btn btn-primary" type="button">Added new comment</button>
    </div>
    <hr />
    <h3 class="text-center d-block mb-3">Sort type</h3>
    <div class="filter-comments">
        <button type="button" class="btn btn-info">LIFO</button>
        <button type="button" class="btn btn-outline-info">Info</button>
        <button type="button" class="btn btn-outline-info">Info</button>
        <button type="button" class="btn btn-outline-info">Info</button>
        <button type="button" class="btn btn-outline-info">Info</button>
    </div>
    <hr />
    <div class="comments">
        <div class="comments__item">
            <div class="comments__header">
                <div class="header-left">
                    <div class="background-img">
                        <img src="/img/test.png" alt="avatar" class="comments__avatar">
                    </div>
                    <b class="comments__name">Rostik</b>
                    <span class="comments__date">26.01.23 в 15:46</span>
                </div>
                <a href="#" class="header-right">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25px" height="25px"
                        viewBox="0 0 25 25" version="1.1">
                        <g id="surface1">
                            <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;"
                                d="M 9.632812 5.9375 L 9.632812 1.410156 L 0 10.265625 L 9.632812 19.125 L 9.632812 15.054688 C 18.984375 15.296875 23.738281 22.488281 23.785156 22.5625 L 24.449219 23.589844 L 24.6875 22.390625 C 24.894531 21.34375 25 20.265625 25 19.1875 C 25 11.027344 19.265625 6.101562 9.632812 5.9375 Z M 23.894531 21.074219 C 22.140625 18.960938 17.203125 14.054688 9.140625 14.054688 L 8.644531 14.054688 L 8.644531 16.871094 L 1.460938 10.265625 L 8.644531 3.664062 L 8.644531 6.925781 L 9.140625 6.925781 C 18.589844 6.925781 24.007812 11.394531 24.007812 19.1875 C 24.007812 19.820312 23.96875 20.449219 23.894531 21.074219 Z M 23.894531 21.074219 " />
                        </g>
                    </svg>
                </a>
            </div>
            <a href="/img/test.png" data-lightbox="test-png" data-title="Image" class="comments__img">
                <img src="/img/test.png" alt="img">
            </a>
            <div class="comments__text">
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officia velit soluta cum, dicta
                    facilis commodi,
                    aspernatur.
                </p>
                <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</span>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officia velit soluta cum, dicta
                    facilis commodi,
                    aspernatur minima odit dolores provident quibusdam doloribus doloremque exercitationem tenetur
                    repellat perspiciatis
                    quisquam id!
                </p>
            </div>

            <div class="sub-comment">
                <div class="comments__item">
                    <div class="comments__header">
                        <div class="header-left">
                            <div class="background-img">
                                <img src="/img/test.png" alt="avatar" class="comments__avatar">
                            </div>
                            <b class="comments__name">Rostik</b>
                            <span class="comments__date">26.01.23 в 15:46</span>
                        </div>
                        <a href="#" class="header-right">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25px"
                                height="25px" viewBox="0 0 25 25" version="1.1">
                                <g id="surface1">
                                    <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;"
                                        d="M 9.632812 5.9375 L 9.632812 1.410156 L 0 10.265625 L 9.632812 19.125 L 9.632812 15.054688 C 18.984375 15.296875 23.738281 22.488281 23.785156 22.5625 L 24.449219 23.589844 L 24.6875 22.390625 C 24.894531 21.34375 25 20.265625 25 19.1875 C 25 11.027344 19.265625 6.101562 9.632812 5.9375 Z M 23.894531 21.074219 C 22.140625 18.960938 17.203125 14.054688 9.140625 14.054688 L 8.644531 14.054688 L 8.644531 16.871094 L 1.460938 10.265625 L 8.644531 3.664062 L 8.644531 6.925781 L 9.140625 6.925781 C 18.589844 6.925781 24.007812 11.394531 24.007812 19.1875 C 24.007812 19.820312 23.96875 20.449219 23.894531 21.074219 Z M 23.894531 21.074219 " />
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div class="comments__text">
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officia velit soluta cum, dicta
                            facilis commodi,
                            aspernatur.
                        </p>
                        <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</span>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officia velit soluta cum, dicta
                            facilis commodi,
                            aspernatur minima odit dolores provident quibusdam doloribus doloremque exercitationem tenetur
                            repellat perspiciatis
                            quisquam id!
                        </p>
                    </div>
                    <div class="sub-comment">
                        <div class="comments__item">
                            <div class="comments__header">
                                <div class="header-left">
                                    <div class="background-img">
                                        <img src="/img/test.png" alt="avatar" class="comments__avatar">
                                    </div>
                                    <b class="comments__name">Rostik</b>
                                    <span class="comments__date">26.01.23 в 15:46</span>
                                </div>
                                <a href="#" class="header-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25px"
                                        height="25px" viewBox="0 0 25 25" version="1.1">
                                        <g id="surface1">
                                            <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;"
                                                d="M 9.632812 5.9375 L 9.632812 1.410156 L 0 10.265625 L 9.632812 19.125 L 9.632812 15.054688 C 18.984375 15.296875 23.738281 22.488281 23.785156 22.5625 L 24.449219 23.589844 L 24.6875 22.390625 C 24.894531 21.34375 25 20.265625 25 19.1875 C 25 11.027344 19.265625 6.101562 9.632812 5.9375 Z M 23.894531 21.074219 C 22.140625 18.960938 17.203125 14.054688 9.140625 14.054688 L 8.644531 14.054688 L 8.644531 16.871094 L 1.460938 10.265625 L 8.644531 3.664062 L 8.644531 6.925781 L 9.140625 6.925781 C 18.589844 6.925781 24.007812 11.394531 24.007812 19.1875 C 24.007812 19.820312 23.96875 20.449219 23.894531 21.074219 Z M 23.894531 21.074219 " />
                                        </g>
                                    </svg>
                                </a>
                            </div>
                            <div class="comments__text">
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officia velit soluta cum, dicta
                                    facilis commodi,
                                    aspernatur.
                                </p>
                                <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</span>
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officia velit soluta cum, dicta
                                    facilis commodi,
                                    aspernatur minima odit dolores provident quibusdam doloribus doloremque exercitationem tenetur
                                    repellat perspiciatis
                                    quisquam id!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="comments__item">
            <div class="comments__header">
                <div class="header-left">
                    <div class="background-img">
                        <img src="/img/test.png" alt="avatar" class="comments__avatar">
                    </div>
                    <b class="comments__name">Rostik</b>
                    <span class="comments__date">26.01.23 в 15:46</span>
                </div>
                <a href="#" class="header-right">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25px"
                        height="25px" viewBox="0 0 25 25" version="1.1">
                        <g id="surface1">
                            <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;"
                                d="M 9.632812 5.9375 L 9.632812 1.410156 L 0 10.265625 L 9.632812 19.125 L 9.632812 15.054688 C 18.984375 15.296875 23.738281 22.488281 23.785156 22.5625 L 24.449219 23.589844 L 24.6875 22.390625 C 24.894531 21.34375 25 20.265625 25 19.1875 C 25 11.027344 19.265625 6.101562 9.632812 5.9375 Z M 23.894531 21.074219 C 22.140625 18.960938 17.203125 14.054688 9.140625 14.054688 L 8.644531 14.054688 L 8.644531 16.871094 L 1.460938 10.265625 L 8.644531 3.664062 L 8.644531 6.925781 L 9.140625 6.925781 C 18.589844 6.925781 24.007812 11.394531 24.007812 19.1875 C 24.007812 19.820312 23.96875 20.449219 23.894531 21.074219 Z M 23.894531 21.074219 " />
                        </g>
                    </svg>
                </a>
            </div>
            <div class="comments__text">
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officia velit soluta cum, dicta
                    facilis commodi,
                    aspernatur.
                </p>
                <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</span>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officia velit soluta cum, dicta
                    facilis commodi,
                    aspernatur minima odit dolores provident quibusdam doloribus doloremque exercitationem tenetur
                    repellat perspiciatis
                    quisquam id!
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {

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
        span {
            display: block;
            padding-left: 5px;
            margin: 20px 0;
            border-left: 2px solid rgb(101, 180, 255);
        }
    }
}
</style>