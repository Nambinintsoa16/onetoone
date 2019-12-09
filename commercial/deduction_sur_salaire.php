         <p class="text-center col-md-12" style="margin-top:3px;">
              <h4 class="text-center" style="font-size:16px;">
                  <?php  setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1'); echo strftime(" %B %Y"); ?>
              </h4>
              
          </p>     
               
               
            <table class="table table-hover   table-bordered " style="font-size:13px;margin-top:20px; ">
               <thead>
                  
                   <tr>

                        <td class="text-center">Description</td>
                        <td class="text-center">Montant</td>
                    </tr>
                   
                  
               </thead>
               <tbody>

                    <tr>
                        <td>Télephone </td>
                        <td style="font-size:10px;text-align:center;"><p><?php 
                        $tel=$main_function->malus('Telephone',$_SESSION['matricule'],date('Y-m'));
                        echo number_format($tel,2,",",".");
                        ?> Ar</p></td>
                    </tr>
                    
                    <tr>
                        <td>Absence </td>
                        <td style="font-size:10px;text-align:center;"><p> <?php 
                        $Abs=$main_function->malus('Absence',$_SESSION['matricule'],date('Y-m'));
                        echo number_format($Abs,2,",",".");
                        ?> Ar</p></td>
                    </tr>
                    
                    <tr>
                        <td>Autre déduction </td>
                        <td style="font-size:10px;text-align:center;"><p><?php 
                        $Aut=$main_function->malus('Autre',$_SESSION['matricule'],date('Y-m'));
                        echo number_format($Aut,2,",",".");
                        ?> Ar</p></td>
                    </tr>
                    
                    <tr>
                        <td>Manque</td>
                        <td style="font-size:10px;text-align:center;"><p><?php 
                        $Man=$main_function->malus('Manque',$_SESSION['matricule'],date('Y-m'));
                        echo number_format($Man,2,",",".");
                        ?> Ar</p></td>
                    </tr>
                    
                    <tr>
                        <td>Malus</td>
                        <td style="font-size:10px;text-align:center;"><p><?php 
                        $Mal=$main_function->malus('Malus',$_SESSION['matricule'],date('Y-m'));
                        echo number_format($Mal,2,",",".");
                        ?> Ar</p></td>
                    </tr>
                    

                  

                </tbody>
            </table>
            
            
            
            <table class="table table-hover   table-bordered " style="font-size:13px;margin-top:20px; ">
               <thead>
                  
                   <tr>

                        <td class="text-center">Total : </td>
                        <td class="text-center">
                        <?php
                          $total=$tel+$Abs+$Aut+$Man+$Mal;
                          echo  number_format($total,2,",","."); 
                          ?>Ar</td>
                    </tr>
                   
                  
               </thead>
               <tbody>

                  
                
                    

                  

                </tbody>
            </table>

            




  </div>
</div>