{include file='header.tpl'}

<body id="page-top">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    {include file='sidebar.tpl'}

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main content -->
        <div id="content">

            <!-- Topbar -->
            {include file='navbar.tpl'}

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">{$TITLE}</h1>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{$PANEL_INDEX}">{$DASHBOARD}</a></li>
                        <li class="breadcrumb-item active">{$CONFIGURATION}</li>
                        <li class="breadcrumb-item active">{$TITLE}</li>
                    </ol>
                </div>

                <!-- Update Notification -->
                {include file='includes/update.tpl'}

                <div class="card shadow mb-4">
                    <div class="card-body">

                        <!-- Success and Error Alerts -->
                        {include file='includes/alerts.tpl'}


                        <h4>{$CHANGE_CONFIG}</h4>
                        <form action="" id="upload_file" class="d-flex w-100" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="token" value="{$TOKEN}">
                            <input type="file" name="config" id="upload-file-config" hidden onchange='uploadFile(this)'>

                            <label for="upload-file-config" id="file-name-label" class="btn btn-secondary w-100">{$UPLOAD_CONFIG}</label>
                            <input type="submit" value="{$SUBMIT}" class="btn btn-primary ml-2" />
                        </form>

                        <hr />

                        <h4>{$GEN_CONFIG}</h4>
                        <a href="{$GEN_CONFIG_SITE}" class="btn btn-primary btn-block">{$CLICK_TO_GO}</a>

                        <script>
                            var file_name_o = '{$FILENAME}';
                            {literal}
                                function uploadFile(target) {
                                    document.getElementById("file-name-label").innerHTML = `${file_name_o}: ${target.files[0].name}`;
                                }
                            {/literal}
                        </script>


                    </div>
                </div>

                <!-- Spacing -->
                <div style="height:1rem;"></div>

                <!-- End Page Content -->
            </div>

            <!-- End Main Content -->
        </div>

        {include file='footer.tpl'}

        <!-- End Content Wrapper -->
    </div>

    <!-- End Wrapper -->
</div>

{include file='scripts.tpl'}

</body>

</html>