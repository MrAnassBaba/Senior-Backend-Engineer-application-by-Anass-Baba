<template>
   <div>
       <div class="color-bg-subtle border-bottom">
           <div class="container-lg p-responsive text-center py-6">
               <h1 class="h1">leaders board for contributors to a repository</h1>

               <p class="f4 color-fg-muted col-md-6 mx-auto">
                   <a href="/createRepository" class="btn-green inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150 ml-4 button"> create your repository </a>
               </p>

               <div id="hideMe" v-if="isActive" ref="alert" class="clipboard-alert">repository copied successfully</div>

           </div>
       </div>
       <div class="position-relative container-lg p-responsive pt-6">
           <div class="Box">
               <div>
                   <article v-for="(item , index) in $page.props.listRepositories" class="Box-row">
                       <div class="float-right d-flex">

                           <template class="js-unstar-confirmation-dialog-template">
                               <div class="Box-header">
                                   <h2 class="Box-title">Unstar this repository?</h2>
                               </div>
                               <div class="Box-body">
                                   <p class="mb-3">
                                       This will remove {{ repoNameWithOwner }} from the {{ listsWithCount }} that it's been added to.
                                   </p>
                                   <div class="form-actions">
                                       <form class="js-social-confirmation-form" data-turbo="false" action="{{ confirmUrl }}" accept-charset="UTF-8" method="post">
                                           <input type="hidden" name="authenticity_token" value="{{ confirmCsrfToken }}">
                                           <input type="hidden" name="confirm" value="true">
                                           <button data-close-dialog="true" type="submit" data-view-component="true" class="btn-danger btn width-full">  Unstar
                                           </button>
                                       </form>    </div>
                               </div>
                           </template>

                           <div data-view-component="true" class="js-toggler-container js-social-container starring-container BtnGroup">


                               <textarea ref="clipboard" class="go-out">{{item.html_url}}</textarea>

                               <button @click="vuecopydemo(index)" class="clipboard">
                                   select a repository
                               </button>


                           </div>
                       </div>


                       <h1 class="h3 lh-condensed">
                           <a data-hydro-click="{&quot;event_type&quot;:&quot;explore.click&quot;,&quot;payload&quot;:{&quot;click_context&quot;:&quot;TRENDING_REPOSITORIES_PAGE&quot;,&quot;click_target&quot;:&quot;REPOSITORY&quot;,&quot;click_visual_representation&quot;:&quot;REPOSITORY_NAME_HEADING&quot;,&quot;actor_id&quot;:95491200,&quot;record_id&quot;:467212329,&quot;originating_url&quot;:&quot;https://github.com/trending&quot;,&quot;user_id&quot;:95491200}}" data-hydro-click-hmac="781555fc86d20c02326c38d11d9be3f74cef7f0317b2417b74e8c467dcc9a10d" v-bind:href="item.html_url" data-view-component="true">
                               <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-repo mr-1 color-fg-muted">
                                   <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                               </svg>

                               <span data-view-component="true" class="text-normal">
                                        {{item.full_name}}
                                </span>
                           </a>
                       </h1>

                       <p class="col-9 color-fg-muted my-1 pr-4">
                           {{item.description}}
                       </p>

                       <div class="f6 color-fg-muted mt-2">
                              <span class="d-inline-block ml-0 mr-3">
                          <span class="repo-language-color" style="background-color: #3572A5"></span>
                          <span itemprop="programmingLanguage">Python</span>
                        </span>


                           <a href="/microsoft/routeros-scanner/stargazers" data-view-component="true" class="Link--muted d-inline-block mr-3">
                               <svg aria-label="star" role="img" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-star">
                                   <path fill-rule="evenodd" d="M8 .25a.75.75 0 01.673.418l1.882 3.815 4.21.612a.75.75 0 01.416 1.279l-3.046 2.97.719 4.192a.75.75 0 01-1.088.791L8 12.347l-3.766 1.98a.75.75 0 01-1.088-.79l.72-4.194L.818 6.374a.75.75 0 01.416-1.28l4.21-.611L7.327.668A.75.75 0 018 .25zm0 2.445L6.615 5.5a.75.75 0 01-.564.41l-3.097.45 2.24 2.184a.75.75 0 01.216.664l-.528 3.084 2.769-1.456a.75.75 0 01.698 0l2.77 1.456-.53-3.084a.75.75 0 01.216-.664l2.24-2.183-3.096-.45a.75.75 0 01-.564-.41L8 2.694v.001z"></path>
                               </svg>
                               252
                           </a>
                           <a href="/microsoft/routeros-scanner/network/members.routeros-scanner" data-view-component="true" class="Link--muted d-inline-block mr-3">
                               <svg aria-label="fork" role="img" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-repo-forked">
                                   <path fill-rule="evenodd" d="M5 3.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm0 2.122a2.25 2.25 0 10-1.5 0v.878A2.25 2.25 0 005.75 8.5h1.5v2.128a2.251 2.251 0 101.5 0V8.5h1.5a2.25 2.25 0 002.25-2.25v-.878a2.25 2.25 0 10-1.5 0v.878a.75.75 0 01-.75.75h-4.5A.75.75 0 015 6.25v-.878zm3.75 7.378a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm3-8.75a.75.75 0 100-1.5.75.75 0 000 1.5z"></path>
                               </svg>
                               44
                           </a>
                           <span data-view-component="true" class="d-inline-block mr-3">
        Built by

          <a class="d-inline-block" data-hydro-click="{&quot;event_type&quot;:&quot;explore.click&quot;,&quot;payload&quot;:{&quot;click_context&quot;:&quot;TRENDING_REPOSITORIES_PAGE&quot;,&quot;click_target&quot;:&quot;CONTRIBUTING_DEVELOPER&quot;,&quot;click_visual_representation&quot;:&quot;DEVELOPER_AVATAR&quot;,&quot;actor_id&quot;:null,&quot;record_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/trending&quot;,&quot;user_id&quot;:97867490}}" data-hydro-click-hmac="0c477586d9fdf9625bbd9252e133c30636832b1cc0f72aa7b2cdcdf866137771" data-hovercard-type="user" data-hovercard-url="/users/noafru/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/noafru"><img class="avatar mb-1 avatar-user" src="https://avatars.githubusercontent.com/u/61191939?s=40&amp;v=4" width="20" height="20" alt="@noafru"></a>
          <a class="d-inline-block" data-hydro-click="{&quot;event_type&quot;:&quot;explore.click&quot;,&quot;payload&quot;:{&quot;click_context&quot;:&quot;TRENDING_REPOSITORIES_PAGE&quot;,&quot;click_target&quot;:&quot;CONTRIBUTING_DEVELOPER&quot;,&quot;click_visual_representation&quot;:&quot;DEVELOPER_AVATAR&quot;,&quot;actor_id&quot;:null,&quot;record_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/trending&quot;,&quot;user_id&quot;:97867490}}" data-hydro-click-hmac="0c477586d9fdf9625bbd9252e133c30636832b1cc0f72aa7b2cdcdf866137771" data-hovercard-type="user" data-hovercard-url="/users/microsoftopensource/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/microsoftopensource"><img class="avatar mb-1 avatar-user" src="https://avatars.githubusercontent.com/u/22527892?s=40&amp;v=4" width="20" height="20" alt="@microsoftopensource"></a>
          <a class="d-inline-block" data-hydro-click="{&quot;event_type&quot;:&quot;explore.click&quot;,&quot;payload&quot;:{&quot;click_context&quot;:&quot;TRENDING_REPOSITORIES_PAGE&quot;,&quot;click_target&quot;:&quot;CONTRIBUTING_DEVELOPER&quot;,&quot;click_visual_representation&quot;:&quot;DEVELOPER_AVATAR&quot;,&quot;actor_id&quot;:null,&quot;record_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/trending&quot;,&quot;user_id&quot;:97867490}}" data-hydro-click-hmac="0c477586d9fdf9625bbd9252e133c30636832b1cc0f72aa7b2cdcdf866137771" href="/apps/microsoft-github-operations"><img class="avatar mb-1" src="https://avatars.githubusercontent.com/in/41902?s=40&amp;v=4" width="20" height="20" alt="@microsoft-github-operations"></a>
</span>
                           <span data-view-component="true" class="d-inline-block float-sm-right">
        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-star">
    <path fill-rule="evenodd" d="M8 .25a.75.75 0 01.673.418l1.882 3.815 4.21.612a.75.75 0 01.416 1.279l-3.046 2.97.719 4.192a.75.75 0 01-1.088.791L8 12.347l-3.766 1.98a.75.75 0 01-1.088-.79l.72-4.194L.818 6.374a.75.75 0 01.416-1.28l4.21-.611L7.327.668A.75.75 0 018 .25zm0 2.445L6.615 5.5a.75.75 0 01-.564.41l-3.097.45 2.24 2.184a.75.75 0 01.216.664l-.528 3.084 2.769-1.456a.75.75 0 01.698 0l2.77 1.456-.53-3.084a.75.75 0 01.216-.664l2.24-2.183-3.096-.45a.75.75 0 01-.564-.41L8 2.694v.001z"></path>
</svg>
        98 stars today
</span>  </div>
                   </article>
               </div>
           </div>
       </div>

   </div>
</template>

<script>
export default {
    name: "Welcome",
    data () {
        return {
            alert: false,
            isActive: false,
        }
    },
    methods: {
        vuecopydemo(index) {
            // copied URL
            this.$refs.clipboard[index].select();
            document.execCommand('copy');
            this.isActive = true;
            setTimeout(() => this.isActive = false, 800)

        }
    },
}
</script>


<style scoped>
.clipboard-alert{
    right: 100px;
    top: 12px;
    background: aquamarine;
    padding: 10px;
    font-size: 12px;
    border-radius: 10px;
}
.go-out{
    position: absolute;
    left: -99999px;
}
.clipboard{
    border: 1px solid #000;
    border-radius: 5px;
    padding: 5px 10px;
    font-size: 14px;
    font-weight: 500;
    line-height: 20px;
    white-space: nowrap;
}
.btn-green{
     width: 100%;
     text-align: center;
     color: white;
     background: #2da44e;
     padding: 15px;
     margin: 0 auto;
     display: inline-block;
     font-weight: bold;
}
.btn-green:hover{
    text-decoration: none;
}
/*! CSS Used from: https://github.githubassets.com/assets/frameworks-e484c110d83e.css ; media=all */
@media all{
    h1{font-size:2em;margin:.67em 0;}
    ::-webkit-input-placeholder{color:inherit;opacity:.54;}
    *{box-sizing:border-box;}
    h1{margin-top:0;margin-bottom:0;}
    h1{font-size:32px;font-weight:600;}
    p{margin-top:0;margin-bottom:10px;}
    ::placeholder{color:var(--color-fg-subtle);opacity:1;}
    .container-lg{max-width:1012px;margin-right:auto;margin-left:auto;}
    @media (min-width: 768px){
        .col-md-6{width:49.99999998%;}
    }
    .border-bottom{border-bottom:1px solid #d0d7de !important;}
    .color-fg-muted{color: #57606a !important;}
    .color-bg-subtle{background-color:#f6f8fa!important;}
    .mx-auto{margin-right:auto!important;margin-left:auto!important;}
    .py-6{padding-top:40px!important;padding-bottom:40px!important;}
    .p-responsive{padding-right:16px!important;padding-left:16px!important;}
    @media (min-width: 544px){
        .p-responsive{padding-right:40px!important;padding-left:40px!important;}
    }
    @media (min-width: 1012px){
        .p-responsive{padding-right:16px!important;padding-left:16px!important;}
    }
    .h1{font-size:26px!important;}
    @media (min-width: 768px){
        .h1{font-size:32px!important;}
    }
    .h1{font-weight:900!important;}
    .f4{font-size:16px!important;}
    @media (min-width: 768px){
        .f4{font-size:16px!important;}
    }
    .text-center{text-align:center!important;}
}
/*! CSS Used from: https://github.githubassets.com/assets/behaviors-15170f5700ad.css ; media=all */
@media all{
    @media (prefers-color-scheme: dark){
        [data-color-mode=auto][data-dark-theme*=dark] ::selection{background-color:var(--color-accent-muted);}
    }
}


/*! CSS Used from: https://github.githubassets.com/assets/frameworks-e484c110d83e.css ; media=all */
@media all{
    article,details{display:block;}
    summary{display:list-item;}
    template{display:none!important;}
    a{background-color:transparent;}
    a:active,a:hover{outline-width:0;}
    h1{font-size:2em;margin:.67em 0;}
    img{border-style:none;}
    svg:not(:root){overflow:hidden;}
    button,input{font:inherit;margin:0;}
    button,input{overflow:visible;}
    button{text-transform:none;}
    button,html [type=button],[type=submit]{-webkit-appearance:button;}
    button::-moz-focus-inner,[type=button]::-moz-focus-inner,[type=submit]::-moz-focus-inner{border-style:none;padding:0;}
    button:-moz-focusring,[type=button]:-moz-focusring,[type=submit]:-moz-focusring{outline:1px dotted ButtonText;}
    ::-webkit-input-placeholder{color:inherit;opacity:.54;}
    *{box-sizing:border-box;}
    input,button{font-family:inherit;font-size:inherit;line-height:inherit;}
    a{color:#0969da;text-decoration:none;}
    a:hover{text-decoration:underline;}
    button{cursor:pointer;border-radius:0;}
    details summary{cursor:pointer;}
    details:not([open])>*:not(summary){display:none!important;}
    h1{margin-top:0;margin-bottom:0;}
    h1{font-size:32px;font-weight:600;}
    p{margin-top:0;margin-bottom:10px;}
    .octicon{vertical-align:text-bottom;}
    .octicon{display:inline-block;overflow:visible!important;vertical-align:text-bottom;fill:currentColor;}
    .Box{background-color:var(--color-canvas-default);border-color:#d0d7de;border-style:solid;border-width:1px;border-radius:6px;}
    .Box-row{padding:16px;margin-top:-1px;list-style-type:none;border-top-color:#d0d7df;border-top-style:solid;border-top-width:1px;}
    .Box-row:first-of-type{border-top-left-radius:6px;border-top-right-radius:6px;}
    .Box-row:last-of-type{border-bottom-right-radius:6px;border-bottom-left-radius:6px;}
    .btn{position:relative;display:inline-block;padding:5px 16px;font-size:14px;font-weight:500;line-height:20px;white-space:nowrap;vertical-align:middle;cursor:pointer;-webkit-user-select:none;user-select:none;border:1px solid;border-radius:6px;-webkit-appearance:none;-moz-appearance:none;appearance:none;}
    .btn:hover{text-decoration:none;}
    .btn:disabled{cursor:default;}
    .btn .octicon{margin-right:4px;color:var(--color-fg-muted);vertical-align:text-bottom;}
    .btn .octicon:only-child{margin-right:0;}
    .btn{color:var(--color-btn-text);background-color:var(--color-btn-bg);border-color:var(--color-btn-border);box-shadow:var(--color-btn-shadow),var(--color-btn-inset-shadow);transition:.2s cubic-bezier(0.3, 0, 0.5, 1);transition-property:color,background-color,border-color;}
    .btn:hover{background-color:var(--color-btn-hover-bg);border-color:var(--color-btn-hover-border);transition-duration:.1s;}
    .btn:active{background-color:var(--color-btn-active-bg);border-color:var(--color-btn-active-border);transition:none;}
    .btn:disabled{color:var(--color-primer-fg-disabled);background-color:var(--color-btn-bg);border-color:var(--color-btn-border);}
    .btn:disabled .octicon{color:var(--color-primer-fg-disabled);}
    .btn:focus{border-color:var(--color-btn-focus-border);outline:none;box-shadow:var(--color-btn-focus-shadow);}
    .btn-sm{padding:3px 12px;font-size:12px;line-height:20px;}
    .btn-sm .octicon{vertical-align:text-top;}
    .BtnGroup{display:inline-block;vertical-align:middle;}
    .BtnGroup::before{display:table;content:"";}
    .BtnGroup::after{display:table;clear:both;content:"";}
    .BtnGroup-item{position:relative;float:left;border-right-width:0;border-radius:0;}
    .BtnGroup-item:first-child{border-top-left-radius:6px;border-bottom-left-radius:6px;}
    .BtnGroup-item:last-child{border-right-width:1px;border-top-right-radius:6px;border-bottom-right-radius:6px;}
    .BtnGroup-item:focus,.BtnGroup-item:active,.BtnGroup-item:hover{border-right-width:1px;}
    .BtnGroup-parent{float:left;}
    .BtnGroup-parent:first-child .BtnGroup-item{border-top-left-radius:6px;border-bottom-left-radius:6px;}
    .BtnGroup-parent:last-child .BtnGroup-item{border-right-width:1px;border-top-right-radius:6px;border-bottom-right-radius:6px;}
    .BtnGroup-parent .BtnGroup-item{border-right-width:0;border-radius:0;}
    .BtnGroup-parent:focus .BtnGroup-item,.BtnGroup-parent:active .BtnGroup-item,.BtnGroup-parent:hover .BtnGroup-item{border-right-width:1px;}
    .BtnGroup-parent:focus+.BtnGroup-parent .BtnGroup-item,.BtnGroup-parent:active+.BtnGroup-parent .BtnGroup-item,.BtnGroup-parent:hover+.BtnGroup-parent .BtnGroup-item{border-left-width:0;}
    .BtnGroup-item:focus,.BtnGroup-item:active,.BtnGroup-parent:focus,.BtnGroup-parent:active{z-index:1;}
    ::placeholder{color:var(--color-fg-subtle);opacity:1;}
    .container-lg{max-width:1012px;margin-right:auto;margin-left:auto;}
    .col-9{width:74.99999997%;}
    .Link--muted{color:var(--color-fg-muted)!important;}
    .Link--muted:hover{color:#0969da!important;text-decoration:none;}
    .anim-pulse-in{animation-name:pulse-in;animation-duration:.5s;}
    .anim-rotate{animation:rotate-keyframes 1s linear infinite;}
    .border-right-0{border-right:0!important;}
    .rounded-left-2{border-bottom-left-radius:6px!important;border-top-left-radius:6px!important;}
    .color-fg-muted{color:var(--color-fg-muted)!important;}
    .color-fg-sponsors{color:var(--color-sponsors-fg)!important;}
    .details-reset>summary{list-style:none;}
    .details-reset>summary::before{display:none;}
    .details-reset>summary::-webkit-details-marker{display:none;}
    .flex-column{flex-direction:column!important;}
    .flex-1{flex:1!important;}
    .flex-auto{flex:auto!important;}
    .position-relative{position:relative!important;}
    .position-absolute{position:absolute!important;}
    .right-0{right:0!important;}
    .v-align-middle{vertical-align:middle!important;}
    .overflow-hidden{overflow:hidden!important;}
    .float-right{float:right!important;}
    .float-none{float:none!important;}
    @media (min-width: 544px){
        .float-sm-right{float:right!important;}
    }
    .mr-0{margin-right:0!important;}
    .ml-0{margin-left:0!important;}
    .mb-1{margin-bottom:4px!important;}
    .mr-1{margin-right:4px!important;}
    .my-1{margin-top:4px!important;margin-bottom:4px!important;}
    .m-2{margin:8px!important;}
    .mt-2{margin-top:8px!important;}
    .mr-2{margin-right:8px!important;}
    .mr-3{margin-right:16px!important;}
    @media (min-width: 768px){
        .mr-md-1{margin-right:4px!important;}
    }
    .px-2{padding-right:8px!important;padding-left:8px!important;}
    .pr-4{padding-right:24px!important;}
    .pt-6{padding-top:40px!important;}
    .p-responsive{padding-right:16px!important;padding-left:16px!important;}
    @media (min-width: 544px){
        .p-responsive{padding-right:40px!important;padding-left:40px!important;}
    }
    @media (min-width: 1012px){
        .p-responsive{padding-right:16px!important;padding-left:16px!important;}
    }
    .h3{font-size:18px!important;}
    @media (min-width: 768px){
        .h3{font-size:20px!important;}
    }
    .h3{font-weight:600!important;}
    .f6{font-size:12px!important;}
    .lh-condensed{line-height:1.25!important;}
    .text-normal{font-weight:400!important;}
    .d-flex{display:flex!important;}
    .d-inline-block{display:inline-block!important;}
    .d-none{display:none!important;}
    @media (min-width: 768px){
        .d-md-inline{display:inline!important;}
        .d-md-inline-block{display:inline-block!important;}
        .d-md-none{display:none!important;}
    }
    body.intent-mouse [role=button]:focus,body.intent-mouse button:focus,body.intent-mouse summary:focus,body.intent-mouse a:focus{outline:none;box-shadow:none;}
    details-menu{display:block;}
    g-emoji{display:inline-block;min-width:1ch;font-family:"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";font-size:1em;font-style:normal!important;font-weight:400;line-height:1;vertical-align:-0.075em;}
}
/*! CSS Used from: https://github.githubassets.com/assets/behaviors-15170f5700ad.css ; media=all */
@media all{
    .avatar{display:inline-block;overflow:hidden;line-height:1;vertical-align:middle;background-color:var(--color-avatar-bg);border-radius:6px;flex-shrink:0;box-shadow:0 0 0 1px var(--color-avatar-border);}
    .SelectMenu{position:fixed;top:0;right:0;bottom:0;left:0;z-index:99;display:flex;padding:16px;pointer-events:none;flex-direction:column;}
    @media (min-width: 544px){
        .SelectMenu{position:absolute;top:auto;right:auto;bottom:auto;left:auto;padding:0;}
    }
    .SelectMenu::before{position:absolute;top:0;right:0;bottom:0;left:0;pointer-events:none;content:"";background-color:var(--color-primer-canvas-backdrop);}
    @media (min-width: 544px){
        .SelectMenu::before{display:none;}
    }
    .SelectMenu-modal{position:relative;z-index:99;display:flex;max-height:66%;margin:auto 0;overflow:hidden;pointer-events:auto;flex-direction:column;background-color:var(--color-canvas-overlay);border:1px solid var(--color-select-menu-backdrop-border);border-radius:12px;box-shadow:var(--color-shadow-large);animation:SelectMenu-modal-animation .12s cubic-bezier(0, 0.1, 0.1, 1) backwards;}
    @media (min-width: 544px){
        .SelectMenu-modal{width:300px;height:auto;max-height:480px;margin:8px 0 16px 0;font-size:12px;border-color:#d0d7de;border-radius:6px;box-shadow:var(--color-shadow-large);animation-name:SelectMenu-modal-animation--sm;}
    }
    .SelectMenu-closeButton{padding:16px;margin:-16px;line-height:1;color:var(--color-fg-muted);background-color:transparent;border:0;}
    @media (min-width: 544px){
        .SelectMenu-closeButton{padding:8px;margin:-8px -7px;}
    }
    .SelectMenu-list{position:relative;padding:0;margin:0;margin-bottom:-1px;flex:auto;overflow-x:hidden;overflow-y:auto;background-color:var(--color-canvas-overlay);-webkit-overflow-scrolling:touch;}
    .SelectMenu-loading{padding:24px 16px;text-align:center;background-color:var(--color-canvas-overlay);}
    .SelectMenu-closeButton:focus{outline:0;}
    @media (hover: hover){
        .SelectMenu-closeButton:hover{color:var(--color-fg-default);}
        .SelectMenu-closeButton:active{color:var(--color-fg-muted);}
    }
    .starred .starred-button-icon{color:var(--color-scale-yellow-2);}
    .starring-container .BtnGroup-parent:active{z-index:auto;}
    .Box-row:first-of-type{border-top-color:transparent;}
    @media (-webkit-min-device-pixel-ratio: 2)and (-webkit-min-device-pixel-ratio: 0), (-webkit-min-device-pixel-ratio: 2)and (min-resolution: 0.001dpcm){
        g-emoji{font-size:1.25em;}
    }
    @media (prefers-color-scheme: dark){
        [data-color-mode=auto][data-dark-theme*=dark] ::selection{background-color:var(--color-accent-muted);}
    }
    .icon-sponsor{transition:transform .15s cubic-bezier(0.2, 0, 0.13, 2);transform:scale(1);}
    .btn:hover .icon-sponsor,.btn:focus .icon-sponsor{transform:scale(1.1);}
    .icon-sponsor{overflow:visible!important;}
    @media (max-width: 543px){
        .SelectMenu-modal{width:unset!important;}
    }
    .starring-container .unstarred{display:block;}
    .starring-container .starred{display:none;}
    .btn .octicon-triangle-down{margin-right:0;}
    .avatar-user{border-radius:50%!important;}
}
/*! CSS Used keyframes */
@keyframes pulse-in{0%{transform:scale3d(1, 1, 1);}50%{transform:scale3d(1.1, 1.1, 1.1);}100%{transform:scale3d(1, 1, 1);}}
@keyframes rotate-keyframes{100%{transform:rotate(360deg);}}
@keyframes SelectMenu-modal-animation{0%{opacity:0;transform:scale(0.9);}}
@keyframes SelectMenu-modal-animation--sm{0%{opacity:0;transform:translateY(-16px);}}
#hideMe {
    -moz-animation: cssAnimation 0s ease-in 5s forwards;
    /* Firefox */
    -webkit-animation: cssAnimation 0s ease-in 5s forwards;
    /* Safari and Chrome */
    -o-animation: cssAnimation 0s ease-in 5s forwards;
    /* Opera */
    animation: cssAnimation 0s ease-in 5s forwards;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
}
@keyframes cssAnimation {
    to {
        width:0;
        height:0;
        overflow:hidden;
    }
}
@-webkit-keyframes cssAnimation {
    to {
        width:0;
        height:0;
        visibility:hidden;
    }
}
</style>
