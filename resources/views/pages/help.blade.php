@extends('app')
@section('title')Help Page
@stop
@section('body')
<div id='contentnav'>Preview Tour</div>
<div id='contentblock'>
    <ol>
        <li>1.0 <a href='#intro'>Introduction</a></li>
        <li>2.0 <a href='#guide'>User's Guide</a>
            <ol>
                <li>2.1 <a href='#access'>Access and Login</a></li>
                <li>2.2 <a href='#interface'>User Interface</a></li>
                <li>2.3 <a href='#data'>Adding / Deleting Entries</a></li>
            </ol>
        </li>
        <li>3.0 <a href='#admin'>Administrative Functions</a>
            <ol>
                <li>3.1 <a href='#panel'>Admin Panel</a></li>
                <li>3.2 <a href='#auth'>Authorized Users</a></li>
                <li>3.3 <a href='#editmap'>Edit Map</a></li>
                <li>3.4 <a href='#reviewuser'>Review Users</a></li>
            </ol>
        </li>
    </ol>

    <div id='intro'><h1>1.0 Introduction</h1></div>
    <div id='helpcontent'>
        The purpose of this document is to guide the user through the process of installing and accessing the product, familiarizing the user with the functionality of the product and providing assistance for any issue that may arise.
    </div>
    <p style='text-align:right;'><a href='#contentnav'>Top</a></p>

    <div id='guide'><h1>2.0 User's Guide</h1></div>
    <div id='subhelp'>
        <div id='access'><h2>2.1 Access and Login</h2></div>
        <div id='helpcontent'>
            Users simply navigate to the homepage url, access the login page and provide their username and password, identifying them as either an agent or an administrator.
        </div>
        <p style='text-align:right;'><a href='#contentnav'>Top</a></p>

        <div id='interface'><h2>2.2 User Interface</h2></div>
        <div id='helpcontent'>
            Agents interact with the system though a simple interface: a Google Maps image of the local area. The user may select the area they want to have a tour of by clicking its location on the map. They will be taken to a form where they can fill out relevant data concerning the tour. The location will be saved and marked on the map for future reference. By clicking on this mark, the agent may edit or even delete this data completely.
            <p>Administrators have access to the same interface, but with additional options including the ability to directly edit all database tables and even the ability to replace or alter the map provided for the interface.</p>
        </div>
        <p style='text-align:right;'><a href='#contentnav'>Top</a></p>

        <div id='data'><h2>2.3 Adding / Deleting Entries</h2></div>
        <div id='helpcontent'>
            By clicking on a location on the interface, the user is taken to a page where they may fill out the following information:<br/>
            <ul>
                <li>MLS Number</li>
                <li>Price</li>
                <li>Date</li>
                <li>Treats</li>
                <li>Notes</li>
            </ul>
            Once this information has been filled out, the user may click the confirmation button, creating a new mark on the map. By clicking on this mark, the user can review this information at any time. They will also be provided with the option to edit or delete any entries. By clicking the edit button, the user will return to the form and may change or replace any information they previously entered. By clicking the delete button, they will be taken to a confirmation page asking if the user really wants to remove the entry. Hitting the confirm button will delete the entry completely, along with any information contained within.
        </div>
        <p style='text-align:right;'><a href='#contentnav'>Top</a></p>
    </div>

    <div id='admin'><h1>3.0 Administrative Functions</h1></div>
    <div id='subhelp'>
        <div id='panel'><h2>3.1 Admin Panel</h2></div>
        <div id='helpcontent'>
            The administrator UI is much the same as the user’s with one major difference: a set of buttons on the bottom of the page that grants the admin additional functionality. They are:
            <ul>
                <li>Authorize User</li>
                <li>Edit Map</li>
                <li>Review Users</li>
            </ul>
        </div>
        <p style='text-align:right;'><a href='#contentnav'>Top</a></p>

        <div id='auth'><h2>3.2 Authorized Users</h2></div>
        <div id='helpcontent'>
            The administrator has the unique ability to add new users to the database, thereby giving them access to the site and it’s basic functionality. By clicking the Authorize User button on the admin panel they will be taken to a form where the following information may be specified:
            <ul>
                <li>User ID</li>
                <li>First Name</li>
                <li>Last Name</li>
                <li>Password</li>
            </ul>
            By filling out this form and hitting the confirmation button, a new user is added to the database. A list of all currently authorized users can be accessed by clicking the Review Users button on the admin panel.

        </div>
        <p style='text-align:right;'><a href='#contentnav'>Top</a></p>

        <div id='editmap'><h2>3.3 Edit Map</h2></div>
        <div id='helpcontent'>
            From this page the Admin may edit or replace the map used in the front page UI. The Admin will be prompted to replace the map image currently used in by the system with a new one; simply specify the access path to the new map image (for example: :c/docs/mapimg.png) and hit the confirmation button. The map on the UI will be replaced with the new image.
        </div>
        <p style='text-align:right;'><a href='#contentnav'>Top</a></p>

        <div id='reviewuser'><h2>3.4 Review Users</h2></div>
        <div id='helpcontent'>
            This page displays a list of all currently authorized users in the database. By clicking on an entry in the list, the Admin will be taken to a page listing all information about that user, including their name, id and current password. From this page, the Admin has the option to edit any of this information. They also have the option to delete the user from the database, preventing them from accessing the site or its functionality again.
        </div>
        <p style='text-align:right;'><a href='#contentnav'>Top</a></p>
    </div>
</div>
@stop