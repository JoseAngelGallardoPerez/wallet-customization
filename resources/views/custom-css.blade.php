{{--
@php
/**
    VARIABLES
    logo.path - {{$logo['path']}}
    logo.margin - {{$logo['margin']}}
    colors.headerBackground - {{$colors['headerBackground']}}
    colors.headerElements - {{$colors['headerElements']}}
    colors.headerBottomLine - {{$colors['headerBottomLine']}}
    colors.menuBackground - {{$colors['menuBackground']}}
    colors.menuElements - {{$colors['menuElements']}}
    colors.mainColor - {{$colors['mainColor']}}
    colors.loginFooter - {{$colors['loginFooter']}}
    colors.loginPageMiddle - {{$colors['loginPageMiddle']}}
**/
@endphp
--}}
.aside__row.active .main_color {
background: {{$colors['mainColor']}} !important;
}
.section.main_color {
border-top-color: {{$colors['mainColor']}} !important;
}
.section.main_color svg g, .section.main_color svg path, .section.main_color svg rect {
stroke: {{$colors['mainColor']}} !important;
}
.filter-container.main_color a:not(.selected):hover span {
color: {{$colors['mainColor']}} !important;
}
.filter-container.main_color a.selected:hover {
color: {{$colors['mainColor']}} !important;
}
.filter-container__term.selected span {
color: {{$colors['mainColor']}} !important;
}
.content .filter-container .selected span {
color: {{$colors['mainColor']}} !important;
}
.content .filter-container .selected {
border-bottom: 2px solid {{$colors['mainColor']}} !important;
color: {{$colors['mainColor']}} !important;
}
.filter-container__term.selected {
border-bottom: 2px solid {{$colors['mainColor']}} !important;
}
.content .filter-container__term:not(.selected):hover span {
color: {{$colors['mainColor']}} !important;
}
.tags-container__tag {
color: {{$colors['mainColor']}} !important;
}
.filter-container.main_color .filter-container__term.selected {
border-color: {{$colors['mainColor']}} !important;
}
.filter-container.main_color .filter-container__term:not(.selected):hover span {
color: {{$colors['mainColor']}} !important;
}
.filter-container.main_color .filter-container__term.selected span {
color: {{$colors['mainColor']}} !important;
}
.pagination.main_color .pagination__page.active {
background: {{$colors['mainColor']}} !important;
border-color: {{$colors['mainColor']}} !important;
}
.main_color .success-color, .main_color .amount_plus {
color: {{$colors['mainColor']}} !important;
}
.main_color .success.main_color {
color: {{$colors['mainColor']}} !important;
}
.def-btn-success.main_color {
background: {{$colors['mainColor']}} !important;
}
.def-btn-success.main_color:hover {
opacity: 0.8;
}
.def-btn-success.main_color.with-icon:after {
background-color: rgba(255, 255, 255, 0.16) !important;
}
.success-link.main_color {
color: {{$colors['mainColor']}} !important;
}
.success-link.main_color {
color: {{$colors['mainColor']}} !important;
}
.actions.sh_.main_color .action {
color: {{$colors['mainColor']}} !important;
}
.color-success.main_color {
color: {{$colors['mainColor']}} !important;
}
.color-success.main_color .round-i {
background: {{$colors['mainColor']}} !important;
}
.button-update.main_color, .amount_plus.main_color {
color: {{$colors['mainColor']}} !important;
}
.main_color .status_executed {
color: {{$colors['mainColor']}} !important;
}
.checkbox-container.main_color input:checked ~ .checkbox-checkmark {
background-color: {{$colors['mainColor']}} !important;
border-color: {{$colors['mainColor']}} !important;
}
.radio-container.main_color input:checked ~ .radio-check {
background-color: {{$colors['mainColor']}} !important;
border-color: {{$colors['mainColor']}} !important;
}
.form.main_color .checkbox-container input:checked ~ .checkbox-checkmark {
background-color: {{$colors['mainColor']}} !important;
border-color: {{$colors['mainColor']}} !important;
}
.form.main_color .radio-container input:checked ~ .radio-check {
background-color: {{$colors['mainColor']}} !important;
border-color: {{$colors['mainColor']}} !important;
}
.form.main_color a.main_color {
color: {{$colors['mainColor']}} !important;
}
.form .main_color a {
color: {{$colors['mainColor']}} !important;
}
.sort-bar.main_color .day-unit.is-selected, .line.main_color .day-unit.is-selected {
background: {{$colors['mainColor']}} !important;
}
.sort-bar.main_color .tags-container__tag, .line.main_color .tags-container__tag {
color: {{$colors['mainColor']}} !important;
}
.row-switch.main_color input:checked + .slider {
background-color: {{$colors['mainColor']}} !important;
}
.row-switch.main_color input:checked + .slider:before {
border-color: {{$colors['mainColor']}} !important;
}
.search-bar.main_color .selected {
color: {{$colors['mainColor']}} !important;
}
.message__header.main_color .icon-user {
background-color: {{$colors['mainColor']}} !important;
}
.message.outgoing .body.main_color {
background: #fafafa !important;
box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1) !important;
}
.success-popup.main_color .content .icon.success {
background: {{$colors['mainColor']}};
}
.success-popup.main_color .popup-message a {
color: {{$colors['mainColor']}} !important;
}
.la-ball-clip-rotate {
color: {{$colors['mainColor']}} !important;
}
.block-menu.main_color .link-active {
color: {{$colors['mainColor']}} !important;
border-bottom: 2px solid {{$colors['mainColor']}} !important;
}
.block-menu ul li a:hover {
color: {{$colors['mainColor']}} !important;
}
@media (max-width: 1191px) {
.filter-container.main_color .sub-menu {
border-color: {{$colors['mainColor']}} !important;
}
.tags-container__tag.main_color {
color: {{$colors['mainColor']}} !important;
}
}
.sign-up__content__link.main_color {
color: {{$colors['mainColor']}} !important;
}
.advices.main_color .advice-container__image {
border-color: {{$colors['mainColor']}} !important;
}
.advices.main_color .advice-container__image svg g {
stroke: {{$colors['mainColor']}} !important;
}
.white-blocks .main_color {
color: {{$colors['mainColor']}} !important;
}
.header {
background-color: {{$colors['headerBackground']}} !important;
border-bottom-color: {{$colors['headerBottomLine']}} !important;
}
.header .greeting__text, .header .controls__logout span {
color: {{$colors['headerElements']}} !important;
}
.header .controls__logout span {
border-color: {{$colors['headerElements']}} !important;
}
.header .controls__messages__text svg path {
fill: {{$colors['headerElements']}} !important;
}
.header .aside-bar__menu-toggle svg g {
fill: {{$colors['headerElements']}} !important;
}
.aside {
background-color: {{$colors['menuBackground']}} !important;
}
.aside .aside__label {
border-bottom-color: {{$colors['menuElements']}} !important;
color: {{$colors['menuElements']}} !important;
}
.login-bg {
background-color: {{$colors['loginPageMiddle']}} !important;
}
.powered-wrapper.login-footer {
background-color: {{$colors['loginFooter']}} !important;
}
.success.main_color {
color: {{$colors['mainColor']}} !important;
}
.action.main_color {
color: {{$colors['mainColor']}} !important;
}
.pagination__page.active+.pagination__page {
border-left: 1px solid {{$colors['mainColor']}} !important;
}
.aside__row.active .aside__label {
border-bottom-color: {{$colors['mainColor']}} !important;
}
.aside__row.active .aside__label:after {
background: {{$colors['mainColor']}} !important;
}
.header .aside-bar__image, .header__logo-container__image {
background: 50% 50% url("{{$logo['path']}}") no-repeat !important;
background-size: contain !important;
}
.table__body tr.unread {
box-shadow: inset 4px 0 0 {{$colors['mainColor']}} !important;
}
.advices.main_color {
background: {{$colors['loginFooter']}};
}
.border_color-main_color {
border-color: {{$colors['mainColor']}} !important;
}
.background_color-main_color {
background-color: {{$colors['mainColor']}} !important;
}
.text_color-main_color {
color: {{$colors['mainColor']}} !important;
}