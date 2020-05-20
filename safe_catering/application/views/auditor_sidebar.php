 <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                      <li>
                    <a href="<?php echo base_url(); ?>Auditor/index">Dashboard</a>
                </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>Vendor Creation<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="<?php echo base_url(); ?>Auditor/vendor_auditor_add">Create New</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>Vendor list<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                          <ul>
                             <li><a href="<?php echo base_url(); ?>Auditor/vendor_list">Vendor list</a></li>
                               <li><a href="<?php echo base_url(); ?>Auditor/yellow_offenders">Yellow Offenders</a></li>
                             <li><a href="<?php echo base_url(); ?>Auditor/orange_offenders">Orange Offenders</a></li>
                             <li><a href="<?php echo base_url(); ?>Auditor/red_offenders">Red Offenders</a></li>
                        </ul>
                    </li>
                   <!--  <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>SC Forms<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="<?php echo base_url(); ?>Auditor/auditor_sc1">SC 1</a></li>
                             <li><a href="<?php echo base_url(); ?>Auditor/auditor_sc2">SC 2</a></li>
                             <li><a href="<?php echo base_url(); ?>Auditor/auditor_sc3">SC 3</a></li>
                             <li><a href="<?php echo base_url(); ?>Auditor/auditor_sc4">SC 4</a></li>
                        </ul>
                    </li> -->
                    <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>Reports<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="<?php echo base_url(); ?>Auditor/sc_reports">View Reports</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url('Login/logout');?>"><i class="ti-close"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>