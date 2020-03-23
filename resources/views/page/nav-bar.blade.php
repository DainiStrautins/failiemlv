<nav class="navbar">
    <ul class="navbar-nav">
        <li class="logo">
            <a href="#" class="nav-link">
                <span class="link-text logo-text">FAILIEM</span>
                <svg
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fad"
                    data-icon="angle-double-right"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"
                    class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x"
                >
                    <g class="fa-group">
                        <path
                            fill="currentColor"
                            d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z"
                            class="fa-secondary"
                        ></path>
                        <path
                            fill="currentColor"
                            d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z"
                            class="fa-primary"
                        ></path>
                    </g>
                </svg>
            </a>
        </li>

        <li class="nav-item">
            <a href="/user" class="nav-link"  id="user">
                <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-user fa-w-14 fa-3x"><g class="fa-group"><path fill="currentColor" d="M352 128A128 128 0 1 1 224 0a128 128 0 0 1 128 128z" class="fa-primary"></path><path fill="currentColor" d="M313.6 288h-16.7a174.1 174.1 0 0 1-145.8 0h-16.7A134.43 134.43 0 0 0 0 422.4V464a48 48 0 0 0 48 48h352a48 48 0 0 0 48-48v-41.6A134.43 134.43 0 0 0 313.6 288z" class="fa-secondary"></path></g></svg>
                <span class="link-text">Uploads</span>
            </a>
        </li>
        @if(Auth::user()->hasRole('admin'))
            <li class="nav-item">
                <a href="/allrecords" class="nav-link" id="admin">
                    <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="user-secret" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-user-secret fa-w-14 fa-3x">
                        <g class="fa-group"><path fill="currentColor" d="M255.38 421.22L224 480l-31.38-58.78L208 352l-17.79-35.58a161.25 161.25 0 0 0 67.58 0L240 352zM224 288a128 128 0 0 0 128-127.21c-7.49 1.54-15.51 3-24 4.2v6.59c-.11.11-6.07 3.47-6.93 6.28-4.23 12.9-7.59 26.65-17.88 36.19-10.94 10.07-52 24.26-69.33-27.09-3-9.1-16.69-9.1-19.83 0-18.41 54.39-60.66 35.1-69.33 27.09-10.29-9.54-13.76-23.29-17.88-36.19-.86-2.7-6.82-6.17-6.82-6.28V165c-8.48-1.25-16.5-2.66-24-4.2A128 128 0 0 0 224 288z" class="fa-secondary"></path><path fill="currentColor" d="M120 165v6.59c0 .11 6 3.58 6.82 6.28 4.12 12.9 7.59 26.65 17.88 36.19 8.67 8 50.92 27.3 69.33-27.09 3.14-9.1 16.79-9.1 19.83 0 17.33 51.35 58.39 37.16 69.33 27.09 10.29-9.54 13.65-23.29 17.88-36.19.86-2.81 6.82-6.17 6.93-6.28V165c52.95-7.83 88-21.47 88-37 0-13.75-27.51-26-70.6-34.09-9.35-32.11-26.69-64.08-40-80.72a32.1 32.1 0 0 0-39.5-8.8l-27.6 13.8a32 32 0 0 1-28.6 0l-27.6-13.8a32.1 32.1 0 0 0-39.5 8.8c-13.22 16.64-30.6 48.61-40 80.72C59.51 102 32 114.25 32 128c0 15.52 35.05 29.16 88 37zm263.9 143.27l23.9-62.58a16 16 0 0 0-15-21.7h-32.12L224 480 87.32 224h-31a16 16 0 0 0-14.7 22.3l25.74 60.06A133.56 133.56 0 0 0 0 422.4V464a48 48 0 0 0 48 48h352a48 48 0 0 0 48-48v-41.6a133.5 133.5 0 0 0-64.1-114.13z" class="fa-primary"></path></g></svg>
                    <span class="link-text">Admin</span>
                </a>
            </li>
        @endif

        <li class="nav-item">
            <a href="/subscription" class="nav-link" id="subscription">
                <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="diamond" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-diamond fa-w-14 fa-3x"><g class="fa-group"><path fill="currentColor" d="M442.14 240.34l-200-232a24 24 0 0 0-36.36 0l-200 232a23.84 23.84 0 0 0 0 31.3l200 232a24 24 0 0 0 36.36 0l200-232a23.84 23.84 0 0 0 0-31.3zm-94.05 26l-111.9 128.15a16.23 16.23 0 0 1-24.38 0L99.91 266.38a15.74 15.74 0 0 1 0-20.76l111.9-128.11a16.23 16.23 0 0 1 24.38 0l111.9 128.11a15.74 15.74 0 0 1 0 20.76z" class="fa-secondary"></path><path fill="currentColor" d="M348.09 245.62a15.74 15.74 0 0 1 0 20.76l-111.9 128.11a16.23 16.23 0 0 1-24.38 0L99.91 266.38a15.74 15.74 0 0 1 0-20.76l111.9-128.11a16.23 16.23 0 0 1 24.38 0z" class="fa-primary"></path></g></svg>   <span class="link-text">Subscription</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="/notifications" class="nav-link" id="notifications">
                @if($count >= 1)
                    <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="bell-exclamation" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-bell-exclamation fa-w-14 fa-3x">
                        <g class="fa-group"><path fill="currentColor" d="M439.39 362.29c-19.32-20.76-55.47-52-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32a32 32 0 1 0-64 0v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29A31.24 31.24 0 0 0 0 384c.11 16.4 13 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32a31.23 31.23 0 0 0-8.61-21.71zM224 352a32 32 0 1 1 32-32 32 32 0 0 1-32 32zm38.2-206.4l-12.8 96a16 16 0 0 1-15.9 14.4h-19a16 16 0 0 1-15.9-14.4l-12.8-96a16.06 16.06 0 0 1 15.9-17.6h44.6a16 16 0 0 1 15.89 17.6z" class="fa-secondary"></path><path fill="currentColor" d="M160 448a64 64 0 1 0 128 0zm64-160a32 32 0 1 0 32 32 32 32 0 0 0-32-32zm-9.5-32h19a16 16 0 0 0 15.9-14.4l12.8-96a16 16 0 0 0-15.9-17.6h-44.6a16.06 16.06 0 0 0-15.9 17.6l12.8 96a16 16 0 0 0 15.89 14.4z" class="fa-primary"></path></g>

                        <svg class="SVGBadge-svg" viewBox="0 0 5 45" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <circle class="SVGBadge-svgBackground" cx="15" cy="8" r="8"/>
                            <text class="SVGBadge-number" x="15" y="12.5" text-anchor="middle">{{ $count }}</text>
                        </svg>

                    </svg>
                @else
                    <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="bell-slash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-bell-slash fa-w-20 fa-3x"><g class="fa-group"><path fill="currentColor" d="M370 416H128.1c-19.12 0-32-15.6-32.1-32a31.24 31.24 0 0 1 8.61-21.71c16.21-17.42 44-42.79 52.62-110.75zm173.64-27.59A32.49 32.49 0 0 0 544 384a31.23 31.23 0 0 0-8.61-21.71c-19.32-20.76-55.47-52-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32a32 32 0 1 0-64 0v20.84c-40.31 8.37-74.89 30.89-97.9 62.33zM320 512a64 64 0 0 0 64-64H256a64 64 0 0 0 64 64z" class="fa-secondary"></path><path fill="currentColor" d="M633.82 458.09L45.47 3.38A16 16 0 0 0 23 6.17L3.37 31.46a16 16 0 0 0 2.81 22.45l588.34 454.71a16 16 0 0 0 22.48-2.79l19.64-25.27a16 16 0 0 0-2.82-22.47z" class="fa-secondary"></path></g></svg>
                @endif

                <span class="link-text">Notifications</span>

            </a>
        </li>
        @if(Auth::user()->hasRole('admin'))
            <li class="nav-item">
                <a href="/telescope" class="nav-link" id="telescope">
                    <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="telescope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-telescope fa-w-20 fa-3x"><g class="fa-group"><path fill="currentColor" d="M263.3594,347.79914,136.3008,391.44163c-8.7539,3.00781-18.05078-.69335-21.26953-8.46678l-8.74219-21.10738L42.17971,388.42211A15.99837,15.99837,0,0,1,21.27737,379.762L1.21877,331.34018a16.00653,16.00653,0,0,1,8.66406-20.90425L73.9844,283.88129,65.24221,262.772c-3.21875-7.77342.73828-16.96481,9.05469-21.02925L380.4219,92.1336l78.125,188.62074-66.60157,22.87691a71.98089,71.98089,0,0,0-143.96093.36914A71.08619,71.08619,0,0,0,263.3594,347.79914Z" class="fa-primary"></path><path fill="currentColor" d="M638.77737,216.83064,553.06252,9.88181a15.99836,15.99836,0,0,0-20.90234-8.66014L414.84377,49.81923a15.99639,15.99639,0,0,0-8.65625,20.90426l85.71094,206.94883a16.00274,16.00274,0,0,0,20.90625,8.66014l117.3125-48.59757A15.99819,15.99819,0,0,0,638.77737,216.83064ZM376.13283,348.50812a71.27481,71.27481,0,0,0,15.85157-44.50773,72,72,0,0,0-144,0,71.27859,71.27859,0,0,0,15.87109,44.53507l-47.46484,142.404A16.00061,16.00061,0,0,0,231.57033,512h16.85938a16.00416,16.00416,0,0,0,15.17969-10.94139l42.16406-126.49585a71.05048,71.05048,0,0,0,28.44922-.002l42.168,126.4978A16.00046,16.00046,0,0,0,391.57033,512h16.85938a16.00062,16.00062,0,0,0,15.17969-21.06051ZM319.9844,328.00035a24,24,0,1,1,24-24A24.03627,24.03627,0,0,1,319.9844,328.00035Z" class="fa-secondary"></path></g></svg>
                    <span class="link-text">Telescope</span>
                </a>
            </li>
        @endif

        <li class="nav-item" id="themeButton">
            <a class="nav-link pointer">
                <svg
                    id="darkIcon"
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fad"
                    data-icon="moon-stars"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"
                    class="svg-inline--fa fa-moon-stars fa-w-16 fa-7x theme-icon"
                >
                    <g class="fa-group">
                        <path
                            fill="currentColor"
                            d="M320 32L304 0l-16 32-32 16 32 16 16 32 16-32 32-16zm138.7 149.3L432 128l-26.7 53.3L352 208l53.3 26.7L432 288l26.7-53.3L512 208z"
                            class="fa-secondary"
                        ></path>
                        <path
                            fill="currentColor"
                            d="M332.2 426.4c8.1-1.6 13.9 8 8.6 14.5a191.18 191.18 0 0 1-149 71.1C85.8 512 0 426 0 320c0-120 108.7-210.6 227-188.8 8.2 1.6 10.1 12.6 2.8 16.7a150.3 150.3 0 0 0-76.1 130.8c0 94 85.4 165.4 178.5 147.7z"
                            class="fa-primary"
                        ></path>
                    </g>
                </svg>
                <svg
                    id="solarIcon"
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fad"
                    data-icon="sun"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"
                    class="svg-inline--fa fa-sun fa-w-16 fa-7x theme-icon"
                >
                    <g class="fa-group">
                        <path
                            fill="currentColor"
                            d="M502.42 240.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.41-94.8a17.31 17.31 0 0 0-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4a17.31 17.31 0 0 0 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.41-33.5 47.3 94.7a17.31 17.31 0 0 0 31 0l47.31-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3a17.33 17.33 0 0 0 .2-31.1zm-155.9 106c-49.91 49.9-131.11 49.9-181 0a128.13 128.13 0 0 1 0-181c49.9-49.9 131.1-49.9 181 0a128.13 128.13 0 0 1 0 181z"
                            class="fa-secondary"
                        ></path>
                        <path
                            fill="currentColor"
                            d="M352 256a96 96 0 1 1-96-96 96.15 96.15 0 0 1 96 96z"
                            class="fa-primary"
                        ></path>
                    </g>
                </svg>
                <svg   id="lightIcon" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="alien" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-alien fa-w-14 fa-3x theme-icon"><g class="fa-group"><path fill="currentColor" d="M224,0C100.28125,0,0,88.0293,0,232.45117,0,344.22852,134.21484,457.04883,194.86328,502.32422a48.70766,48.70766,0,0,0,58.27344,0C313.78516,457.04883,448,344.22852,448,232.45117,448,88.0293,347.71875,0,224,0ZM176,320H144a80.00021,80.00021,0,0,1-80-80,15.99954,15.99954,0,0,1,16-16h32a79.999,79.999,0,0,1,80,80A16.00079,16.00079,0,0,1,176,320Zm128,0H272a16.00079,16.00079,0,0,1-16-16,79.999,79.999,0,0,1,80-80h32a15.99954,15.99954,0,0,1,16,16A80.00021,80.00021,0,0,1,304,320Z" class="fa-secondary"></path><path fill="currentColor" d="M112,224H80a15.99954,15.99954,0,0,0-16,16,80.00021,80.00021,0,0,0,80,80h32a16.00079,16.00079,0,0,0,16-16A79.999,79.999,0,0,0,112,224Zm256,0H336a79.999,79.999,0,0,0-80,80,16.00079,16.00079,0,0,0,16,16h32a80.00021,80.00021,0,0,0,80-80A15.99954,15.99954,0,0,0,368,224Z" class="fa-primary"></path></g></svg>
                <span class="link-text">Themify</span>
            </a>
        </li>
    </ul>
</nav>
