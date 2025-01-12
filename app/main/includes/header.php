<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HomeWork</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      * {
        font-family: Arial, sans-serif;
      }

      body {
        background: #f0f2f58f;
      }

      .nav-link.link-body-emphasis:hover {
        background: #0d6efd08;
      }

      fieldset {
        border: 1px solid rgba(175, 175, 175, 0.836) !important;
        padding: 0 1em 1em 1em !important;
        margin: 0.5em 0 !important;
        border-radius: 9px;
      }

      legend {
        padding: 0.2em 0.5em;
        border: 1px solid rgba(175, 175, 175, 0.836);
        font-size: 0.9em;
        font-weight: 500 !important;
        width: auto;
        text-align:left;
        border-radius: 9px;
        margin-top: -15px;
        background: #fff;
      }

      .csm-section {
        margin-top: 30px;
        margin-bottom: 30px;
        width: 100%;
        margin-right: 30px;
        box-shadow: 0px 0px 7px 0px rgba(0, 0, 0, 0.2);
        border-radius: 25px;
        padding: 15px;
      }

      .btn-action {
        font-size: 13px;
      }

      .table-tbody td {
        font-size: 15px;
      }

      .table-thead th {
        font-size: 15px;
      }

      a {
        text-decoration: none;
      }

      .cms-body {
        display: flex;
        flex-wrap: nowrap;
      }

      .sidebar-desktop {
        height: 53px;
        background: #0d6efd08 !important;
        padding: 15px;
        border-top-left-radius: 25px;
        border-top-right-radius: 25px;
      }

      @media only screen and (max-width: 789px) {
        .cms-body {
          display: block !important;
        }

        .sidebar-desktop {
          display: none !important;
        }

        .csm-section {
          box-shadow: none !important;
        }

        header {
          box-shadow: none !important;
          height: auto !important;
          width: auto !important;
        }

        header ul {
          border: 1px solid rgb(175 175 175 / 41%) !important;
          border-radius: 19px;
          padding-bottom: 8px;
        }
      }
    </style>
  </head>
  <body class="cms-body">
    <header class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="padding: 0px !important; width: 240px; margin: 30px; height: 91vh; box-shadow: 0px 0px 7px 0px rgba(0,0,0,0.2); border-radius: 25px;">
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="sidebar-desktop">
          <span style="font-size: 18px;">
            <b>HomeWork</b>
          </span>
        </li>
<?php include_once(NAVITEMS); ?>
      </ul>
    </header>
