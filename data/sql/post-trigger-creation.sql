CREATE OR REPLACE FUNCTION create_view_flat_guest_reg() returns trigger as '
DECLARE
  rfield RECORD;
  from_string TEXT;
BEGIN
  from_string := '''';

  FOR rfield IN SELECT * FROM reg_field ORDER BY id LOOP
      from_string := from_string || 
                     '' left outer join '' || 
                     '' (SELECT guest_id as guest_id_'' || rfield.id || '', '' || 
                     '' reg_field_id as reg_field_id_'' || rfield.id || '', '' || 
                     '' value as '' || rfield.name ||
                     '' FROM guest_reg '' || 
                     '' WHERE reg_field_id = '' || rfield.id || '') '' || 
                     ''   AS r'' || rfield.id || 
                     ''   ON (g.id=r'' || rfield.id || ''.guest_id_'' || rfield.id || '') '';
  END LOOP;

  DROP VIEW IF EXISTS flat_guest_reg;
  EXECUTE ''CREATE view flat_guest_reg AS '' ||
          ''SELECT DISTINCT(g.id) as did, * '' || 
          ''FROM guest g'' || 
          from_string;
  return null;
END;
' LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS refresh_flat_guest_reg on public.reg_field;
CREATE TRIGGER refresh_flat_guest_reg
  AFTER INSERT OR UPDATE OR DELETE ON public.reg_field
    EXECUTE PROCEDURE create_view_flat_guest_reg();
