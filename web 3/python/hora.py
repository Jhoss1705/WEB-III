def hora_inversa(hora, minutos):
    hora = hora % 12
    hora_opuesta = (hora + 6) % 12

    if hora_opuesta == 0:
        hora_opuesta = 12

    return hora_opuesta, minutos


h = int(input("Introduce la hora: "))
m = int(input("Introduce los minutos: "))

h_inv, m_inv = hora_inversa(h, m)

print("Hora inversa:", h_inv, ":", m_inv)
