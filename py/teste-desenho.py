import turtle

seta = turtle.Turtle()
seta.speed(10)
janela = turtle.getscreen()


turtle.Screen().bgcolor("Black")
seta.color("cyan")

def flor():
    for i in range(4):
        for i in range(10):
            for i in range(2):
                seta.forward(100)
                seta.right(60)
                seta.forward(100)
                seta.right(120)
            seta.right(36)
        seta.right(63)

flor()