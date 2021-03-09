procedure test();
var a,c,stimeMin,texttime : String;
 timeadd,Hr,Min,Sec,timeInt,timeMin,timeSec : Integer;
 TimeWait :DateTime; 
 
begin
    timeadd:=0;
    if (  (DBPipeline['lab_code']=92 ) or //LDL
          (DBPipeline['lab_code']=378) or  //Urine Methamphetamine
          (DBPipeline['lab_code']=334) or  //Urine preg test
          (DBPipeline['lab_code']=52) or   //Electrolyte Na K Cl TCO2
          (DBPipeline['lab_code']=297) or  //Megnesium
          (DBPipeline['lab_code']=447)) then  //Troponin  T
      begin 
           timeadd := CheckTimeAdd(20,timeadd);   //BUN //Creatinine   //Calcium   //Phosphorus
      end else if ( (DBPipeline['lab_code']=77) or   //BUN
                    (DBPipeline['lab_code']=163) or   //Creatinine
                    (DBPipeline['lab_code']=276) or  //Calcium
                    (DBPipeline['lab_code']=277) or  //Phosphorus
                    (DBPipeline['lab_code']=95)   // Albumin   
      ) then
      begin 
          timeadd := CheckTimeAdd(25,timeadd);
      end else if ( (DBPipeline['lab_code']=248) or  //FBS FPG ( FBS )
                    (DBPipeline['lab_code']=474 )or  //FBS
                    (DBPipeline['lab_code']=173) or //FBS 100gm OGTT
                    //(DBPipeline['lab_code']=581) or  //FBS(OGTT)
                    //(DBPipeline['lab_code']=1526) or //FBS 75gm OGTT
                    (DBPipeline['lab_code']=64 ) or // CBC
                    (DBPipeline['lab_code']=79) then  //Uric acid
     
      begin 
          timeadd := CheckTimeAdd(30,timeadd);
      end else if (  
                    (DBPipeline['lab_code']=102) or  // Cholesterol
                    (DBPipeline['lab_code']=103)   //Triglyceride
      ) then
      begin 
          timeadd := CheckTimeAdd(35,timeadd);
      end else if ( (DBPipeline['lab_code']=198) or   //%HbA1C
                    (DBPipeline['lab_code']=65)    //UA
      ) then
      begin 
          timeadd := CheckTimeAdd(60,timeadd);
      end else if ( (DBPipeline['lab_code']=55))   //LFT 
                    
      then
      begin 
          timeadd := CheckTimeAdd(70,timeadd);
      end;
    end;
        a:= TimeToStr(CurrentTime); 
        //a:= '23:40:00' ;
        a:=StringReplaceAll(a, ':', '', true); 
        timeInt:= StrToInt(a) ;
        timeMin:= (timeInt mod 10000);
        timeSec:= (timeInt mod 100);
        Hr:=  (timeInt / 10000);
        Min:=  (timeMin / 100);
       //Sec:=  (timeSec / 1);
        Min:=Min+timeadd ;
        Hr:=Hr+(Min/60);
        Min:=Min mod 60;
        
        if (Hr>=24) then
        Begin 
          Hr:=Hr mod 24;
          TimeWait :=EncodeTime(Hr, Min, 0, 0);
          Label1.Visible := True ;
          Label2.Visible := True ;
          Label1.Text := 'เวลาที่จะรายงานผล : วันพรุ่งนี้  ';
          Label2.Text := 'เวลา '+TimeToStr(TimeWait)+' น.' ;
          //texttime :='เวลาที่จะรายงานผล : วันพรุ่งนี้ '+TimeToStr(TimeWait)+' น.';
        end else begin
          TimeWait :=EncodeTime(Hr, Min, 0, 0); 
          Label1.Text := 'เวลาที่จะรายงานผล : '+TimeToStr(TimeWait)+' น.';
          Label2.Visible := False ;
          //texttime :='เวลาที่จะรายงานผล : '+TimeToStr(TimeWait)+' น.';
        end;

end;                  