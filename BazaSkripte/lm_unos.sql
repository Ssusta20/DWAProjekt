insert into lm_sif_aktivnost(sifra,opis)values('Tel','Telefonski razgovor');
insert into lm_sif_aktivnost(sifra,opis)values('Em','E-mail');
insert into lm_sif_aktivnost(sifra,opis)values('Sms','SMS poruka');
insert into lm_sif_aktivnost(sifra,opis)values('Sas','Sastanak');
insert into lm_status_akt(sifra,opis) values('P','Planirano');
insert into lm_status_akt(sifra,opis) values('R','Realizirano');
insert into lm_aktivnost(rb,datum,napomena,lm_lead_id,lm_sif_aktivnost_id,lm_status_akt_id) values(1,'02.05.2014','Test',6,1,1);
create view lm_kalendar_v1 as 
select a.id,
date_format(a.datum,'%e.%c.%Y') datum,
a.napomena,
l.ime,
l.prezime,
l.naziv_tvrtke,
sa.sifra sifra_akt,
sa.opis opis_akt,
sta.sifra sifra_sta,
sta.opis opis_sta,
u.id user_id 
from lm_aktivnost a,
lm_user u,
lm_lead l,
lm_sif_aktivnost sa,
lm_status_akt sta
Where a.lm_lead_id=l.id 
and a.lm_sif_aktivnost_id = sa.id 
and lm_status_akt_id = sta.id 
and u.id=l.lm_user_id;