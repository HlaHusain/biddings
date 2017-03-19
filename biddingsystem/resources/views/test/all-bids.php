<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid ">
            <ul class="nav navbar-nav ">

                <li  class="active text-center"><a href="/all-bids">All Bids</a></li>
                <li class="text-center" ><a href="/my-opened-bids">My Opened Bids</a></li>
                <li class="text-center" ><a  href="/my-closed-bids">My Closed Bids</a></li>
            </ul>
        </div>
    </nav>

    <h2>All Bids  &#8352;</h2>
    <p>Table below view all biddings "Opened and closed biddings".</p>

    <div  ng-controller="user">

        <div class="row">
            <input class="form-control" type="text" value="" ng-model="search" placeholder="Search..."/>
        </div>
        </br>

        <div class="row">
            <div>
                <table   class=" table table-responsive" >

                    <thead class="thead-inverse">
                    <tr class="text-center" >

                        <th class="text-center">Item</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Remaining</th>
                        <th class="text-center">Participant</th>
                        <th class="text-center">Started</th>
                        <th class="text-center">Current</th>
                        <th class="text-center">Increment</th>
                    </tr>
                    </thead>

                    <tbody id="myTable">
                    <tr class="text-center"  ng-repeat="data in myData | filter : search   " ng-if="data.status != 'not started' " >

                        <td>{{data.Item}}</td>
                        <td>{{data.Description}}</td>
                        <td>{{test(data.Start_date,data.Period,$index)}}</td>
                        <td >{{data.Participant}}</td>
                        <td>{{data.Started}}</td>
                        <td class="text-center">
                            <button  ng-if="data.status == 'opened' " class="btn btn-success btn-xs" ng-click="inc($index)">&#10010;</button>
                            <button  ng-if="data.status == 'closed' " class="btn btn-success btn-xs" ng-click="inc($index)" disabled>&#10010;</button>
                            {{data.Current}}
                            <button ng-if="data.status == 'opened' " class="btn btn-danger btn-xs" ng-click="dec($index)">&#10134;</button>
                            <button ng-if="data.status == 'closed' " class="btn btn-danger btn-xs" ng-click="dec($index)" disabled>&#10134;</button>
                        </td>
                        <td>{{data.Increment}}</td>
                        <td><button ng-if="data.status == 'opened' " class="btn btn-info" ng-click="bid($index)">&#9998;Bid</button>
                            <button ng-if="data.status == 'closed' " class="btn btn-info" ng-click="bid($index)" disabled>&#9998;Bid</button>
                        </td>
                    </tr>

                    </tbody>

                </table>
            </div>

        </div>

        <!--  <script src="app/countdown.js"></script> -->

    </div>
</div>
