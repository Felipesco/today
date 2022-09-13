# Um programa que mostre quantas cadeiras tem disponivel para reserva
# Vou colocar que tem 10 cadeiras, sim... Um cinema pequeno.

cadeiras = []
cadeiras = [1,2,3,4,5,6,7,8,9,10]

def disp():
    print("Temos " + str(len(cadeiras)) + " cadeiras disponiveis\nSão elas:"+str(cadeiras)+"\nQual deseja escolher ?")
    escolha = int(input("Cadeira: "))
    
    if escolha > 10 or escolha == 0:
        print("\nEscolha um numero de cadeira válido ")
        return disp()
    
    else:
        # Verificação da cadeira
        print("teste")


disp()