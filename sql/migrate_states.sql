# Update states to proper capitalization
update zipcodes
    set fullstate = concat(left(fullstate, 1), lower(right(fullstate, (length(fullstate) -1))));
    
update zipcodes
    set fullstate = concat(left(fullstate,(locate(' ', fullstate) -1)), upper(substring(fullstate, locate(' ', fullstate), 2)), lower(substr(fullstate, (locate(' ', fullstate) +2))) )
    where locate(' ', fullstate) > 0;  
    
commit;    