<style>
.table-forms-container > .ui-tabs-nav {
    margin: -10px -10px 10px;
}
</style>
<div id="tabs" class="table-forms-container ui-tabs ui-corner-all ui-widget ui-widget-content"
    style="font-size: 100%; font: inherit; vertical-align: baseline; margin: 0 0 10px; background-color: #ffffff; border: 1px solid #dfe4e7; padding: 10px; text-align: left;">

    <ul class="ui-tabs-nav tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header" role="tablist"
        style="padding: 0; border: 0; font-size: 100%; font: inherit;
        vertical-align: baseline; list-style: none; height: 30px; line-height: 30px;
        border-bottom: 1px solid #ebeef0;
        ">

        <li role="tab" tabindex="0"
            class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active"
            aria-controls="userTab" aria-labelledby="tab_userTab" aria-selected="true" aria-expanded="true"
            style="margin: 0; padding: 0; border: 0; font-size: 100%; font: inherit; vertical-align: baseline; display: inline-block; border-left: 0;">

            <a id="tab_userTab" href="#userTab" role="presentation" tabindex="-1" class="ui-tabs-anchor"
                style="margin: 0; font-size: 100%; font: inherit; vertical-align: baseline; border: 0; transition: background-color .2s ease-out; padding: 8px 10px 6px; background-color: transparent; color: #1f2c33; text-decoration: none; cursor: default; border-bottom: 3px solid #0275b8;">User</a>
        </li>

        <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="mediaTab"
            aria-labelledby="tab_mediaTab" aria-selected="false" aria-expanded="false"
            style="margin: 0; padding: 0; border: 0; font-size: 100%; font: inherit; vertical-align: baseline; display: inline-block;">

            <a id="tab_mediaTab" js-indicator="media" href="#mediaTab" role="presentation" tabindex="-1"
                class="ui-tabs-anchor" data-indicator="count" data-indicator-value="0"
                style="margin: 0; font-size: 100%; font: inherit; vertical-align: baseline; color: #0275b8; text-decoration: none; border: 0; padding: 8px 10px; transition: background-color .2s ease-out;">Media</a>
        </li>

        <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"
            aria-controls="permissionsTab" aria-labelledby="tab_permissionsTab" aria-selected="false"
            aria-expanded="false"
            style="margin: 0; padding: 0; border: 0; font-size: 100%; font: inherit; vertical-align: baseline; display: inline-block;">

            <a id="tab_permissionsTab" href="#permissionsTab" role="presentation" tabindex="-1" class="ui-tabs-anchor"
                style="margin: 0; font-size: 100%; font: inherit; vertical-align: baseline; color: #0275b8; text-decoration: none; border: 0; padding: 8px 10px; transition: background-color .2s ease-out;">Permissions</a>
        </li>
    </ul>

    <div id="userTab" aria-hidden="false" aria-labelledby="tab_userTab" role="tabpanel"
        class="ui-tabs-panel ui-corner-bottom ui-widget-content"
        style="margin: 0; padding: 0; border: 0; font-size: 100%; font: inherit; vertical-align: baseline;">
        @include('admin.users.tabbar-1')
    </div>
    <div id="mediaTab"
        style="margin: 0; padding: 0; border: 0; font-size: 100%; font: inherit; vertical-align: baseline; display: none;"
        aria-hidden="true" aria-labelledby="tab_mediaTab" role="tabpanel"
        class="ui-tabs-panel ui-corner-bottom ui-widget-content">
        @include('admin.users.tabbar-2')
    </div>
    <div id="permissionsTab"
        style="margin: 0; padding: 0; border: 0; font-size: 100%; font: inherit; vertical-align: baseline; display: none;"
        aria-hidden="true" aria-labelledby="tab_permissionsTab" role="tabpanel"
        class="ui-tabs-panel ui-corner-bottom ui-widget-content">
        @include('admin.users.tabbar-3')
    </div>

    <ul class="table-forms"
        style="margin: 0; padding: 0; border: 0; font-size: 100%; font: inherit; vertical-align: baseline; list-style: none; display: table; width: 100%; color: #1f2c33;">
        <li
            style="margin: 0; padding: 0; border: 0; font-size: 100%; font: inherit; vertical-align: baseline; display: table-row;">
            <div class="table-forms-td-left"
                style="margin: 0; border: 0; font-size: 100%; font: inherit; display: table-cell; padding: 5px 0; text-align: right; vertical-align: top; width: 15%; white-space: nowrap;">
            </div>
            <div class="table-forms-td-right tfoot-buttons"
                style="margin: 0; border: 0; font-size: 100%; font: inherit; display: table-cell; padding: 5px 0 5px 10px; vertical-align: middle; width: 85%; position: relative;">
                <button type="submit" name="action" value="user.create" id="add"
                    style="font-family: Arial, Tahoma, Verdana, sans-serif; font-size: 1em; background-color: #0275b8; border: 1px solid #0275b8; border-radius: 2px; color: #ffffff; padding: 0 11px; min-height: 24px; cursor: pointer; outline: 0; transition: border-color .2s ease-out, background-color .2s ease-out; margin: 0 10px 0 0;">Add</button><button
                    type="button" data-url="zabbix.php?action=user.list" id="cancel" class="btn-alt"
                    style="font-family: Arial, Tahoma, Verdana, sans-serif; font-size: 1em; border: 1px solid #0275b8; border-radius: 2px; padding: 0 11px; min-height: 24px; cursor: pointer; outline: 0; transition: border-color .2s ease-out, background-color .2s ease-out; color: #0275b8; background-color: transparent; margin: 0 10px 0 0;">Cancel</button>
            </div>
        </li>
    </ul>

</div>
