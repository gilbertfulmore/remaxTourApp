@extends('app')
@section('title')Help Page
@stop
@section('body')
<div id=contentnav></div>
<div class='contentheader'>Preview Tour</div>
<div class='contentblock'>
    <ol style='list-style-type: none;'>
        <li>1.0 <a href='#intro'>Introduction</a></li>
        <li>2.0 <a href='#userguide'>User's Guide</a>
            <ol style='list-style-type: none;'>
                <li>2.1 <a href='#access'>Access and Login</a></li>
                <li>2.2 <a href='#interface'>User Interface</a></li>
                <li>2.3 <a href='#map'>Map Page</a></li>
                <li>2.4 <a href='#data'>Adding / Deleting Entries</a></li>
            </ol>
        </li>
        <li>3.0 <a href='#admin'>Administrative Functions</a>
            <ol>
                <li>3.1 <a href='#panel'>Admin Panel</a></li>
                <li>3.2 <a href='#regagent'>Register Agent</a></li>
                <li>3.3 <a href='#edittour'>Edit Tours</a></li>
                <li>3.4 <a href='#orgtour'>Organize Tours</a></li>
                <li>3.5 <a href='#reviewuser'>Review Users</a></li>
            </ol>
        </li>
    </ol>

    <div id='intro'><h1>1.0 Introduction</h1></div>
    <div id='helpcontent'>
        The purpose of this document is to guide the user through the process of installing and accessing the product, familiarizing the user with the functionality of the product and providing assistance for any issue that may arise.
    </div>
    <p style='text-align:right;'><a href='#contentnav'>Top</a></p>

    <div id='userguide'><h1>2.0 User's Guide</h1></div>
    <div id='subhelp'>
        <div id='access'><h2>2.1 Access and Login</h2></div>
        <div id='helpcontent'>
            Users simply navigate to the homepage url, access the login page and provide their username and password, identifying them as either an agent or an administrator.
        </div>
        <p style='text-align:right;'><a href='#contentnav'>Top</a></p>

        <div id='interface'><h2>2.2 User Interface</h2></div>
        <div id='helpcontent'>
            After logging in, users will presented with a list if three options: View Tours, Map and Submit Property. From here a user may submit new properties to the database, view their properties on the map page or view a list of any properties currently confirmed for that week’s tour. In addition to this list, a user may also select several options from the header: view/edit all their current listings, view the online help page or logout. Administrators will see an additional option, Admin, which will redirect them to the admin page.
        </div>
        <p style='text-align:right;'><a href='#contentnav'>Top</a></p>

        <div id='map'><h2>2.3 Map Page</h2></div>
        <div id='helpcontent'>
            Once an agent has added a property to the database, it’s location will be marked on a dedicated map page that keeps track of all locations currently being listed. An agent may choose to view all listings or only their own, and by clicking on the marked locations they may view more information about it, including it’s address, size and mls number.
        </div>
        <p style='text-align:right;'><a href='#contentnav'>Top</a></p>

        <div id='data'><h2>2.4 Adding / Deleting Entries</h2></div>
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

        <div id='regagent'><h2>3.2	Register Agent</h2></div>
        <div id='helpcontent'>
            The administrator has the unique ability to add new users to the database, thereby giving them access to the site and it’s basic functionality. By clicking the Authorize User button on the admin panel they will be taken to a form where the following information may be specified:
            <ul>
                <li>User ID</li>
                <li>First Name</li>
                <li>Last Name</li>
                <li>Email</li>
                <li>Password</li>
                <li>Auth Level (determines whether user is an admin or agent)</li>
            </ul>
            By filling out this form and hitting the confirmation button, a new user is added to the database. A list of all currently authorized users can be accessed by clicking the View Agents button on the admin panel.
        </div>
        <p style='text-align:right;'><a href='#contentnav'>Top</a></p>

        <div id='edittour'><h2>3.3	Edit Tours</h2></div>
        <div id='helpcontent'>
            From this page the Admin may view a list of all confirmed listings currently in the database. A listing may be upgraded to “On Tour” (added to the list of that weeks tours), removed from the list of tours, downgraded back to submitted or removed from the database entirely. The admin may also edit any entries on the list, even if they are already marked as confirmed.
        </div>
        <p style='text-align:right;'><a href='#contentnav'>Top</a></p>

        <div id='orgtour'><h2>3.4	Organize Tours</h2></div>
        <div id='helpcontent'>
            Every property in a tour is assigned a rank, which denotes their order in the tour. From this page, the admin may change each entries rank via a drop-down menu, exchanging the current rank for another one.
        </div>
        <p style='text-align:right;'><a href='#contentnav'>Top</a></p>

        <div id='reviewuser'><h2>3.5	Review Users</h2></div>
        <div id='helpcontent'>
            This page displays a list of all currently authorized users in the database. By clicking on an entry in the list, the Admin will be taken to a page listing all information about that user, including their name, id and current password. From this page, the Admin has the option to edit any of this information. They also have the option to delete the user from the database, preventing them from accessing the site or its functionality again.
        </div>
        <p style='text-align:right;'><a href='#contentnav'>Top</a></p>

    </div>
</div>
@stop