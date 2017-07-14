/*For getting Daily */
SELECT COUNT(led)
FROM control
  WHERE currenttimestamp >= ('2017-04-14 00:00:00') 
   AND currenttimestamp <=  ('2017-04-17 23:59:59')
   GROUP BY CAST(currenttimestamp AS DATE);
  



  /*Blink between two dates */
SELECT (CAST(currenttimestamp AS DATE)),(COUNT(currenttimestamp)) 
FROM arduino.control 
WHERE currenttimestamp >= ('2017-04-14 00:00:00') AND currenttimestamp <= ('2017-04-25 23:59:59') ;
GROUP BY CAST(currenttimestamp AS DATE);
   


   /*Hourly Blinks*/
   SELECT HOUR(currenttimestamp) AS "Hours(X : 00 to 59)", COUNT(led)
FROM control
  WHERE currenttimestamp >= ('2017-04-16 00:00:00') 
   AND currenttimestamp <=  ('2017-04-16 23:59:59')
   GROUP BY HOUR(currenttimestamp);