import turtle

seta = turtle.Turtle()

def flor():
    for i in range(10):
        for i in range(2):
            seta.forward(100)
            seta.right(60)
            seta.forward(100)
            seta.right(120)
        seta.right(36)

flor()