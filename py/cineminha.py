# Um programa que mostre quantas cadeiras tem disponivel para reserva
# Vou colocar que tem 10 cadeiras, sim... Um cinema pequeno.
import random

cadeiras = []
cadeiras = [1,2,3,4,5,6,7,8,9,10]

def disp():
    print("Temos " + str(len(cadeiras)) + " cadeiras disponiveis\nSão elas:"+str(cadeiras)+"\nQual deseja escolher ?")
    escolha = int(input("Cadeira: "))
    print("\n")

    if escolha > 10 or escolha == 0:
        print("Escolha um numero de cadeira válido!\n")
        return disp()
    
    elif (escolha in cadeiras) == True:
        cadeiras.remove(escolha)
        print("Sua cadeira foi reservada com sucesso! :)\nInfo:")
        print("Código do bilhete da cadeira: "+ random.randrange(100,250))
        

disp()